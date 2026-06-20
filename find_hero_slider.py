import json

with open(r'C:\Users\kamar\.gemini\antigravity-ide\brain\7d2e76b8-bf1e-4874-aed7-9117796e256f\.system_generated\logs\transcript.jsonl', 'r', encoding='utf-8') as f:
    lines = f.readlines()

print(f'Total steps: {len(lines)}')

# Search for hero-related content in the transcript
print('\n=== Searching for hero slider references in transcript ===')
for line in lines:
    try:
        step = json.loads(line)
        idx = step.get('step_index', 0)
        content = str(step.get('content', ''))
        
        # Look for hero slider mentions
        if 'heroSlider' in content or 'hero-slider' in content or 'hero_slider' in content or 'initHeroSlider' in content:
            step_type = step.get('type', '')
            print(f'Step {idx} [{step_type}]: ...{content[max(0,content.find("hero")-20):content.find("hero")+100]}...')
    except Exception as e:
        pass
