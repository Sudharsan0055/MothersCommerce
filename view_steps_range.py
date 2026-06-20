import json

with open(r'C:\Users\kamar\.gemini\antigravity-ide\brain\7d2e76b8-bf1e-4874-aed7-9117796e256f\.system_generated\logs\transcript.jsonl', 'r', encoding='utf-8') as f:
    lines = f.readlines()

# Look at step 1136 - "Restore proper glassmorphism layout"
for line in lines:
    try:
        step = json.loads(line)
        idx = step.get('step_index', 0)
        if 1120 <= idx <= 1145:
            step_type = step.get('type', '')
            content = step.get('content', '')
            tc = step.get('tool_calls', [])
            print(f'=== Step {idx} [{step_type}] ===')
            if tc:
                for t in tc:
                    print(f'  Tool: {t.get("name")} Args: {str(t.get("args",""))[:200]}')
            else:
                print(f'  Content: {content[:300]}')
    except Exception as e:
        pass
