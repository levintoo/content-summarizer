# Content Summarizer

Content Summarizer turns YouTube videos into structured, timestamped summaries. Paste a video link, and the app fetches the transcript, summarizes it with an AI model and shows the result live as soon as it is ready. You can then ask follow-up questions about the video.

Users bring their own AI provider API key. New accounts get a 7-day free trial, and after that a paid subscription through Paystack is required.

## Features

- Summaries of YouTube videos with section headers and timestamps
- Follow-up questions answered using the video's summary
- Per-user preferences: AI provider and model, API key, language, summary length (brief, balanced or extensive) and an optional custom prompt
- Real-time updates over WebSockets while a summary is being generated
- Sharing summaries and giving feedback on them
- Email and password login with two-factor authentication, plus Google sign-in
- Subscriptions and billing through Paystack
- Admin panel for managing users, providers, models, plans, subscriptions and content

## Tech Stack

- PHP 8.5 and Laravel 13
- Livewire 3, Jetstream and Fortify for the app and authentication
- WireUI and Tailwind CSS 3 for the UI
- Filament 3 for the admin panel
- Laravel Reverb and Laravel Echo for real-time broadcasting
- Database queues for background jobs
- Laravel Pulse and Telescope for monitoring and debugging
- Pest for tests
- Laravel Boost and Laravel MCP for AI-assisted development

## How It Works

1. **Submit a link.** On `/summary/create` the user pastes a YouTube link and can override their default language and summary length. The app checks that the user has an active subscription or trial, and has picked a provider, model and API key in settings.
2. **Fetch the video.** `YoutubeService` reads the video title and channel, then fetches the caption track. Videos without captions can't be summarized.
3. **Split the transcript.** `ChunkTranscriptJob` converts the captions into timestamped text and splits it into chunks sized to half the selected model's context window.
4. **Summarize each chunk.** `SummarizeChunkJob` sends each chunk to the AI provider through `OpenAIService` and stores the partial summary and token usage.
5. **Combine the chunks.** `CombineChunksJob` waits until every chunk is summarized, then asks the model for one final summary that applies the user's language, length and custom prompt.
6. **Show the result.** `ContentSummarisedEvent` is broadcast over a private channel, so the summary page updates without a reload.
7. **Ask questions.** `AskQuestionJob` answers follow-up questions using the video's title, channel and summary, and broadcasts `QuestionAnsweredEvent` when the answer is ready.

Transcripts, video details and AI responses are cached to avoid repeat requests.

### Billing

Paystack sends webhook events to `POST /api/paystack-webhook`. `SubscriptionService` uses them to create and update subscriptions, charges, invoices and refunds. Plans are managed in the admin panel and matched to Paystack by their plan code.

### Admin Panel

The Filament panel lives at `/admin` and is only open to users with the admin or super admin role. Pulse at `/pulse` uses the same admin check. Telescope at `/telescope` is only registered in the local environment.

## Requirements

- PHP 8.5 or newer, with the `pdo_sqlite` (or `pdo_mysql`), `mbstring`, `xml`, `dom` and `curl` extensions
- Composer 2
- Node.js and npm
- SQLite (the default) or MySQL
- An OpenAI-compatible API key for each user who will create summaries
- Optional: a Google OAuth client for Google sign-in
- Optional: a Paystack account for subscriptions

## Setup

### 1. Install dependencies

```bash
git clone <repository-url> content-summarizer
```

```bash
cd content-summarizer
```

```bash
composer install
```

```bash
npm install
```

### 2. Configure the environment

```bash
cp .env.example .env
```

```bash
php artisan key:generate
```

Set `APP_NAME` and `APP_URL` in `.env`. The default database is SQLite. To use MySQL, set `DB_CONNECTION=mysql` and fill in the `DB_*` values.

Real-time updates use Reverb. Add these values to `.env`:

```dotenv
BROADCAST_CONNECTION=reverb

REVERB_APP_ID=your-app-id
REVERB_APP_KEY=your-app-key
REVERB_APP_SECRET=your-app-secret
REVERB_HOST=localhost
REVERB_PORT=8080
REVERB_SCHEME=http

VITE_REVERB_APP_KEY="${REVERB_APP_KEY}"
VITE_REVERB_HOST="${REVERB_HOST}"
VITE_REVERB_PORT="${REVERB_PORT}"
VITE_REVERB_SCHEME="${REVERB_SCHEME}"
```

For Google sign-in, set `GOOGLE_CLIENT_ID`, `GOOGLE_CLIENT_SECRET` and `GOOGLE_REDIRECT_URI`. The redirect URI is `APP_URL` followed by `/auth/google/callback`.

For billing, set `PAYSTACK_API_KEY` and `PAYSTACK_API`, then point your Paystack webhook at `APP_URL` followed by `/api/paystack-webhook`.

### 3. Set up the database

```bash
php artisan migrate
```

### 4. Create an admin user

Register an account in the app, then give it the admin role:

```bash
php artisan tinker --execute 'App\Models\User::where("email", "you@example.com")->firstOrFail()->assignRole(App\Enums\RoleEnum::ADMIN);'
```

### 5. Add a provider and model

Sign in at `/admin` and create:

- A **provider**, for example `OpenAI`
- An **AI model** for that provider, for example `gpt-4o-mini`, with its context window and max output tokens

Users pick from these in their settings, so at least one of each must exist before anyone can create a summary. Add **plans** too if you use Paystack billing.

### 6. Run the app

```bash
composer run dev
```

This starts the web server, queue worker, log viewer and Vite together. Reverb runs separately:

```bash
php artisan reverb:start
```

Open `APP_URL`, sign in, go to **Settings** and choose a provider, model and API key. You can then create your first summary.

The queue worker must be running, or summaries will never finish.

## Testing

```bash
php artisan test
```

Tests use the settings in `.env.testing`. To run them against an in-memory SQLite database instead:

```bash
DB_CONNECTION=sqlite DB_DATABASE=:memory: php artisan test
```

Some feature tests render pages, so run `npm run build` first.

## AI-Assisted Development

The project includes Laravel Boost, which gives AI agents project-aware tools, guidelines and skills. The MCP server is configured in `.mcp.json` and only runs when `APP_ENV=local` or `APP_DEBUG=true`. Project rules for agents are in `AGENTS.md`.
