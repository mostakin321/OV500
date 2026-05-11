#!/usr/bin/env bash
set -euo pipefail

ROOT="${1:-.}"

if rg -n '^(<{7}|={7}|>{7})' "$ROOT" \
    -g '!vendor/**' \
    -g '!node_modules/**' \
    -g '!storage/**' \
    -g '!bootstrap/cache/**'; then
    echo "Merge conflict markers were found. Resolve them before committing." >&2
    exit 1
fi

echo "No merge conflict markers found."
