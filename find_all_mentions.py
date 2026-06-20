import json

log_path = r"C:\Users\kamar\.gemini\antigravity-ide\brain\7d2e76b8-bf1e-4874-aed7-9117796e256f\.system_generated\logs\transcript.jsonl"

search_terms = ["hero", "slider", "slide", "slice", "messed", "fade", "reveal"]

with open(log_path, "r", encoding="utf-8") as f:
    for idx, line in enumerate(f):
        lower_line = line.lower()
        if any(term in lower_line for term in search_terms):
            try:
                data = json.loads(line)
                step = data.get("step_index", "unknown")
                # Look for tool calls first
                if "tool_calls" in data:
                    for call in data["tool_calls"]:
                        name = call.get("name")
                        args = call.get("args", {})
                        # If it's a replacement tool call
                        if name in ["replace_file_content", "multi_replace_file_content", "write_to_file"]:
                            print(f"\n--- STEP {step} (Tool Call: {name}) ---")
                            print(f"Target: {args.get('TargetFile') or args.get('AbsolutePath')}")
                            desc = args.get("Description") or args.get("Instruction")
                            if desc:
                                print(f"Description/Instruction: {desc}")
                            # If it modified files, look at content
                            if "ReplacementChunks" in args:
                                chunks = args["ReplacementChunks"]
                                if isinstance(chunks, str):
                                    try:
                                        chunks = json.loads(chunks)
                                    except:
                                        pass
                                for c_idx, chunk in enumerate(chunks):
                                    rc = chunk.get("ReplacementContent", "")
                                    if "hero" in rc.lower() or "slide" in rc.lower():
                                        print(f"Chunk {c_idx} contains matching text (showing first 5 lines):")
                                        print("\n".join(rc.splitlines()[:5]))
                            elif "ReplacementContent" in args:
                                rc = args["ReplacementContent"]
                                print("ReplacementContent contains matching text (showing first 5 lines):")
                                print("\n".join(rc.splitlines()[:5]))
                            elif "CodeContent" in args:
                                cc = args["CodeContent"]
                                print("CodeContent contains matching text (showing first 5 lines):")
                                print("\n".join(cc.splitlines()[:5]))
                # If there's an output or text content containing matches
                elif data.get("type") in ["USER_INPUT", "PLANNER_RESPONSE", "SYSTEM_MESSAGE"]:
                    # Print context of match
                    content = data.get("content", "")
                    if content:
                        print(f"\n--- STEP {step} (Message: {data.get('type')}) ---")
                        # Find occurrences of search terms and print surrounding lines
                        lines = content.splitlines()
                        for l_idx, l in enumerate(lines):
                            if any(term in l.lower() for term in search_terms):
                                start = max(0, l_idx - 2)
                                end = min(len(lines), l_idx + 3)
                                print(f"Line {l_idx}:")
                                print("\n".join(lines[start:end]))
                                print("-" * 20)
            except Exception as e:
                pass
