import json

log_path = r"C:\Users\kamar\.gemini\antigravity-ide\brain\7d2e76b8-bf1e-4874-aed7-9117796e256f\.system_generated\logs\transcript.jsonl"
steps_to_extract = [1122, 1126, 1128, 1136, 1150, 1156]

with open(log_path, "r", encoding="utf-8") as f:
    for line in f:
        try:
            data = json.loads(line)
            step = data.get("step_index", 0)
            if step in steps_to_extract:
                if "tool_calls" in data:
                    for call in data["tool_calls"]:
                        name = call.get("name")
                        if name in ["replace_file_content", "multi_replace_file_content", "write_to_file"]:
                            print(f"\n================ STEP {step} ({name}) ================")
                            args = call.get("args", {})
                            print(f"TargetFile: {args.get('TargetFile')}")
                            print(f"Description: {args.get('Description')}")
                            print(f"Instruction: {args.get('Instruction')}")
                            if "ReplacementChunks" in args:
                                print("ReplacementChunks:")
                                print(json.dumps(args["ReplacementChunks"], indent=2))
                            if "ReplacementContent" in args:
                                print("ReplacementContent:")
                                print(args["ReplacementContent"])
                            if "TargetContent" in args:
                                print("TargetContent:")
                                print(args["TargetContent"])
        except Exception as e:
            pass
