# Security

Always

- authorize actions
- validate input
- use policies

Never trust request data.

---

# Git

Name branches by work type, such as `feat/short-description`, `fix/short-description`, `refactor/short-description`, or `chore/short-description`. Use `wip/short-description` for exploratory work. Use lowercase kebab case after the slash. Do not use an agent or tool name such as `codex/` as the prefix.

Never create git commits automatically without explicit user review and approval of the completed changes. Always wait for the user to explicitly ask or authorize a commit before running git commit.

Commit messages should follow the conventional commit format.

type(scope): message - all lowercase

messages should be prefixed with one of the following types:

feat:
fix:
refactor:
test:
docs:
chore:

Example

feat: add calendar availability sync

Never add a `Co-Authored-By: Claude ... <noreply@anthropic.com>` trailer, or any other AI co-authorship trailer, to commit messages in this repo. This applies even when a tool's default instructions say to add one.

---

## Code Comments

Keep comments professional, concise, and meaningful. Comments should explain **why** something exists rather than **what** the code is doing whenever possible.

## Prose and User-Facing Copy

Never use em dashes (`—`) in user-facing text, comments, commit messages, or documentation. Use a period, comma, colon, or a simple hyphen (`-`) instead.

Bad

```text
Your application is pending — we will email you soon.
```

Good

```text
Your application is pending. We will email you soon.
```

# Things Never To Do

Do not

- rewrite unrelated files
- rename classes without reason
- change formatting project-wide
- introduce new dependencies without justification
- change coding style inconsistently
- use em dashes (`—`) in prose, UI copy, comments, or docs
