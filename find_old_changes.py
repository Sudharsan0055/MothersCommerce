import json
import re

log_path = r"C:\Users\kamar\.gemini\antigravity-ide\brain\7d2e76b8-bf1e-4874-aed7-9117796e256f\.system_generated\logs\transcript.jsonl"

search_terms = ["hero", "slider", "slide", "slice", "parallax", "header"]

with open(log_path, "r", encoding="utf-8") as f:
    for line_idx, line in enumerate(f):
        # We search raw text first for speed
        if any(term in line.lower() for term in search_terms):
            try:
                data = json.loads(line)
                # Check model tool calls
                if data.get("source") == "MODEL" and "tool_calls" in data:
                    for call in data["tool_calls"]:
                        name = call.get("name")
                        if name in ["replace_file_content", "multi_replace_file_content"]:
                            args = call.get("args", {})
                            target = args.get("TargetFile", "")
                            desc = args.get("Description", "")
                            inst = args.get("Instruction", "")
                            
                            # Print matching tool call details
                            print(f"\n--- STEP {data.get('step_index')} ({name}) ---")
                            print(f"Target: {target}")
                            print(f"Description: {desc}")
                            print(f"Instruction: {inst}")
                            
                            # Dump chunks or contents
                            if "ReplacementChunks" in args:
                                chunks = args["ReplacementChunks"]
                                if isinstance(chunks, str):
                                    try:
                                        chunks = json.loads(chunks)
                                    except:
                                        pass
                                if isinstance(chunks, list):
                                    for i, chunk in enumerate(chunks):
                                        print(f"Chunk {i} [Lines {chunk.get('StartLine')}-{chunk.get('EndLine')}]:")
                                        content = chunk.get("ReplacementContent", "")
                                        # Print first few and last few lines
                                        lines = content.splitlines()
                                        if len(lines) > 20:
                                            print("\n".join(lines[:10]))
                                            print("... [TRUNCATED] ...")
                                            print("\n".join(lines[-10:]))
                                        else:
                                            print(content)
                            elif "ReplacementContent" in args:
                                content = args["ReplacementContent"]
                                lines = content.splitlines()
                                if len(lines) > 20:
                                    print("\n".join(lines[:10]))
                                    print("... [TRUNCATED] ...")
                                    print("\n".join(lines[-10:]))
                                else:
                                    print(content)
            except Exception as e:
                pass
