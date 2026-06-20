import json

log_path = r"C:\Users\kamar\.gemini\antigravity-ide\brain\7d2e76b8-bf1e-4874-aed7-9117796e256f\.system_generated\logs\transcript.jsonl"
output_path = r"c:\Users\kamar\Downloads\Mothers\index_edits.txt"

with open(log_path, "r", encoding="utf-8") as f, open(output_path, "w", encoding="utf-8") as out:
    for line in f:
        if "index.html" in line:
            try:
                data = json.loads(line)
                idx = data.get("step_index")
                source = data.get("source")
                if source == "MODEL" and "tool_calls" in data:
                    for t in data["tool_calls"]:
                        args = t.get("args", {})
                        target = str(args.get("TargetFile", ""))
                        if "index.html" in target:
                            out.write(f"Step {idx}: {t.get('name')} - {args.get('Description', '')}\n")
            except:
                pass


