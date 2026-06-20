import subprocess

def run_git(args):
    try:
        res = subprocess.run(["git"] + args, capture_output=True, text=True, check=True)
        return res.stdout
    except Exception as e:
        return f"Error running git {' '.join(args)}: {e}"

print("=== GIT LOG ===")
print(run_git(["log", "--oneline", "-n", "15"]))

print("\n=== GIT BRANCHES ===")
print(run_git(["branch", "-a"]))

print("\n=== GIT REFLOG ===")
print(run_git(["reflog", "-n", "15"]))
