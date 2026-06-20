import json

log_path = r"C:\Users\kamar\.gemini\antigravity-ide\brain\7d2e76b8-bf1e-4874-aed7-9117796e256f\.system_generated\logs\transcript.jsonl"
output_path = r"c:\Users\kamar\Downloads\Mothers\story_slider_code.txt"

with open(log_path, "r", encoding="utf-8") as f, open(output_path, "w", encoding="utf-8") as out:
    found = False
    for line in f:
        if "story-slide" in line:
            try:
                data = json.loads(line)
                idx = data.get("step_index")
                if "tool_calls" in data:
                    for t in data["tool_calls"]:
                        args = t.get("args", {})
                        content = args.get("ReplacementContent", "") + str(args.get("ReplacementChunks", ""))
                        if "story-slide" in content:
                            out.write(f"=== Step {idx} ===\n")
                            out.write(f"Description: {args.get('Description')}\n")
                            out.write(f"Instruction: {args.get('Instruction')}\n")
                            out.write(f"Code:\n{content}\n\n")
                            found = True
            except:
                pass
    if not found:
        out.write("No direct replacement tool calls found containing 'story-slide'")





