import re
with open('index.html', 'r', encoding='utf-8') as f:
    html = f.read()

start = html.find('id="tab-cones"')
if start != -1:
    end = html.find('id="tab-oils"')
    print(html[start-50:end])
else:
    print("Not found")
