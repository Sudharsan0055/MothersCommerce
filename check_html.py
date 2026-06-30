from bs4 import BeautifulSoup
import sys

with open('index.html', 'r', encoding='utf-8') as f:
    html = f.read()

soup = BeautifulSoup(html, 'html.parser')

wrapper = soup.find(class_='savon-mega-menu-wrapper')
if not wrapper:
    print('Wrapper not found!')
    sys.exit()

print(f'Wrapper contains: {[c.name for c in wrapper.children if c.name]}')
mega_menu = wrapper.find(class_='savon-mega-menu')
if mega_menu:
    print(f'Mega menu contains: {[c.name for c in mega_menu.children if c.name]}')
    
    # check if nav links are inside wrapper
    links = wrapper.find_all('a', class_='nav-link')
    print(f'Nav links inside wrapper: {[l.text for l in links]}')
