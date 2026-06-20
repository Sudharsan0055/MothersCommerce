import json

with open(r'C:\Users\kamar\.gemini\antigravity-ide\brain\7d2e76b8-bf1e-4874-aed7-9117796e256f\.system_generated\logs\transcript.jsonl', 'r', encoding='utf-8') as f:
    lines = f.readlines()

print('File modifications BEFORE smoke effect (steps 800-1130):')
for line in lines:
    try:
        step = json.loads(line)
        idx = step.get('step_index', 0)
        if idx < 800 or idx > 1130:
            continue
        step_type = step.get('type', '')
        if step_type in ['WRITE_FILE', 'REPLACE_FILE', 'MULTI_REPLACE_FILE']:
            tc = step.get('tool_calls', [])
            for tc_item in tc:
                args = tc_item.get('args', {})
                target = str(args.get('TargetFile', ''))[:80]
                desc = str(args.get('Description', ''))[:120]
                instr = str(args.get('Instruction', ''))[:120]
                print(f'Step {idx} [{step_type}]:')
                print(f'  File: {target}')
                print(f'  Desc: {desc}')
                print(f'  Instr: {instr}')
                print()
    except Exception as e:
        pass
