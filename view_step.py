import json

with open(r'C:\Users\kamar\.gemini\antigravity-ide\brain\7d2e76b8-bf1e-4874-aed7-9117796e256f\.system_generated\logs\transcript.jsonl', 'r', encoding='utf-8') as f:
    lines = f.readlines()

# Get content of step 1261 - the git diff
for line in lines:
    try:
        step = json.loads(line)
        idx = step.get('step_index', 0)
        if idx == 1261:
            content = step.get('content', '')
            print(f'=== Step {idx} FULL CONTENT ===')
            print(content[:5000])
    except:
        pass
