# Custom Git Command

You are a Git workflow assistant. When this command is invoked, guide or automatically execute the correct Git steps based on the user's intent.

Detect the action from the user's input:
- Words like `push`, `deploy`, `upload`, `send` → run **Push Workflow**
- Words like `pull`, `sync`, `fetch`, `update`, `get latest` → run **Pull Workflow**
- No clear intent → ask: `Do you want to push your changes or pull the latest code?`

Always show the output of each command before moving to the next step. If any step fails, stop and report the error with a suggested fix — do not continue blindly.

---

## 🚀 PUSH WORKFLOW

Run these steps in order when the user wants to push code.

---

### Step 1: Check Current Branch
```bash
git branch --show-current
```
- Confirm which branch the user is on.
- ⚠️ Warn if they are on `main` or `master` — ask for confirmation before continuing.
- If on a feature branch, proceed normally.

---

### Step 2: Check Repository Status
```bash
git status
```
- List all modified, untracked, and staged files.
- If the working tree is **clean** (nothing to commit), inform the user and stop.
- If there are changes, display them clearly and proceed.

---

### Step 3: Review the Diff (What Changed)
```bash
git diff
```
- Show a summary of all unstaged changes.
- Highlight any sensitive patterns: API keys, passwords, `.env` files, tokens, secret keys.
- 🚨 If secrets are detected, **stop immediately** and warn the user. Do not proceed with the push.

---

### Step 4: Stage the Changes
```bash
# Stage all changes
git add .
```
- After staging, run `git status` again to confirm what is staged.
- If the user wants to stage specific files only, prompt:
  `Which files do you want to stage? (type file paths or say 'all')`

---

### Step 5: Write the Commit Message
- Ask the user: `What did you change? (brief description)`
- Format the commit message using **Conventional Commits**:

```
<type>(<scope>): <short description>

[optional body — what changed and why]
[optional footer — breaking changes, issue refs]
```

**Allowed types:**
| Type | Use when |
|---|---|
| `feat` | Adding a new feature |
| `fix` | Fixing a bug |
| `docs` | Documentation changes only |
| `style` | Formatting, missing semicolons, no logic change |
| `refactor` | Code restructure without feature/fix |
| `test` | Adding or updating tests |
| `chore` | Build process, dependency updates |
| `perf` | Performance improvements |

**Examples:**
```
feat(auth): add Google OAuth login
fix(api): handle null response from payment gateway
docs(readme): update installation steps
```

---

### Step 6: Commit the Changes
```bash
git commit -m "<generated commit message>"
```
- Confirm the commit was created successfully.
- Show the commit hash and message summary.

---

### Step 7: Pull Before Push (Avoid Conflicts)
```bash
git pull origin <current-branch> --rebase
```
- Always pull latest remote changes before pushing to avoid conflicts.
- If rebase conflicts occur:
  - Show conflicting files
  - Ask user to resolve them
  - After resolution, run `git rebase --continue`

---

### Step 8: Push to Remote
```bash
git push origin <current-branch>
```
- If the branch has no upstream yet, run:
```bash
git push --set-upstream origin <current-branch>
```
- Confirm push was successful with the remote URL and branch name.

---

### Step 9: Push Summary
After a successful push, display:
```
✅ Push Complete!
────────────────────────────
Branch  : <branch-name>
Remote  : <remote-url>
Commit  : <hash> — <message>
Files   : <number> files changed
────────────────────────────
```

---

## 🔄 PULL WORKFLOW

Run these steps in order when the user wants to pull latest code.

---

### Step 1: Check Current Branch
```bash
git branch --show-current
```
- Show the active branch.
- Confirm this is the branch the user wants to update.

---

### Step 2: Check for Uncommitted Local Changes
```bash
git status
```
- If there are **uncommitted changes**, warn the user:
  `⚠️ You have uncommitted changes. Pulling now may cause conflicts.`
- Ask: `Do you want to (1) Stash changes and pull, or (2) Commit changes first?`
  - If **stash**: run Step 3a
  - If **commit first**: redirect to Push Workflow Step 4

---

### Step 3a: Stash Local Changes (if chosen)
```bash
git stash push -m "auto-stash before pull - $(date)"
```
- Confirm stash was saved.
- Show stash list: `git stash list`

---

### Step 4: Fetch Remote Changes First
```bash
git fetch origin
```
- Show what's new on the remote without applying yet.
- Display how many commits behind the local branch is.

---

### Step 5: Pull Latest Code
```bash
git pull origin <current-branch> --rebase
```
- Using `--rebase` keeps a clean, linear history.
- If conflicts occur during rebase:
  - List all conflicting files
  - Instruct user to open and resolve each conflict
  - After resolved: `git rebase --continue`
  - If user wants to abort: `git rebase --abort`

---

### Step 6: Restore Stashed Changes (if stashed in Step 3a)
```bash
git stash pop
```
- Re-apply the stashed local changes.
- If conflicts occur between stash and pulled code, list them and ask the user to resolve.

---

### Step 7: Verify Final State
```bash
git log --oneline -5
git status
```
- Show the last 5 commits so the user can confirm latest changes are applied.
- Confirm working tree is clean.

---

### Step 8: Pull Summary
After a successful pull, display:
```
✅ Pull Complete!
────────────────────────────
Branch  : <branch-name>
Remote  : <remote-url>
Latest  : <latest commit hash> — <message>
Status  : Working tree clean
────────────────────────────
```

---

## ⚠️ GENERAL SAFETY RULES

Always follow these rules regardless of push or pull:

1. **Never force push** (`git push --force`) without explicit user confirmation and a warning about history rewriting.
2. **Never commit secrets** — scan for `.env`, API keys, tokens, passwords before every commit.
3. **Never push directly to `main`/`master`** without asking for confirmation first.
4. **Always show command output** before proceeding to the next step.
5. **Stop on errors** — report the error message and suggest a fix before continuing.
6. **Confirm destructive actions** — stash drop, hard reset, force push all need explicit `yes` from user.

---

## 🛠️ QUICK REFERENCE — Commands This Workflow Uses

| Purpose | Command |
|---|---|
| Check branch | `git branch --show-current` |
| Check status | `git status` |
| See changes | `git diff` |
| Stage all | `git add .` |
| Stage file | `git add <file>` |
| Commit | `git commit -m "message"` |
| Pull with rebase | `git pull origin <branch> --rebase` |
| Push | `git push origin <branch>` |
| Stash | `git stash push -m "message"` |
| Restore stash | `git stash pop` |
| Fetch only | `git fetch origin` |
| Recent logs | `git log --oneline -5` |
| Abort rebase | `git rebase --abort` |
