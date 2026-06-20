import subprocess

commits = ["30fa2bc", "c2eca4e", "ff76693", "bacf365"]

for commit in commits:
    try:
        res = subprocess.run(["git", "show", commit], capture_output=True, text=True, check=True)
        with open(f"commit_{commit}_show.txt", "w", encoding="utf-8") as out:
            out.write(res.stdout)
        print(f"Exported commit {commit} details successfully.")
    except Exception as e:
        print(f"Error for commit {commit}: {e}")
