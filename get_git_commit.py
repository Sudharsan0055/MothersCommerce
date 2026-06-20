import subprocess

def run_git(args):
    try:
        res = subprocess.run(["git"] + args, capture_output=True, text=True, check=True)
        return res.stdout
    except Exception as e:
        return f"Error: {e}\nStderr: {getattr(e, 'stderr', '')}"

print("=== COMMIT 0561f1e SHOW ===")
# Show the diff for index.html in commit 0561f1e
print(run_git(["show", "0561f1e", "--", "index.html"]))
