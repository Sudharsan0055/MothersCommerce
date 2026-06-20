import json

with open(r'C:\Users\kamar\.gemini\antigravity-ide\brain\7d2e76b8-bf1e-4874-aed7-9117796e256f\.system_generated\logs\transcript.jsonl', 'r', encoding='utf-8') as f:
    lines = f.readlines()

# Look at step 1123 content (CODE_ACTION result of step 1122)
for line in lines:
    try:
        step = json.loads(line)
        idx = step.get('step_index', 0)
        if idx in [1123, 1137]:
            step_type = step.get('type', '')
            content = step.get('content', '')
            print(f'=== Step {idx} [{step_type}] - FULL DIFF ===')
            print(content[:3000])
            print()
    except Exception as e:
        pass
