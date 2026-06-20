import subprocess

try:
    # Run git log to find diffs for whySlider
    output = subprocess.check_output(
        ["git", "log", "-S", "whySlider", "-p"],
        stderr=subprocess.STDOUT,
        text=True
    )
    with open("why_slider_history.txt", "w", encoding="utf-8") as out:
        out.write(output)
    print("Git diff for whySlider written to why_slider_history.txt")
except Exception as e:
    print(f"Error running git: {e}")




