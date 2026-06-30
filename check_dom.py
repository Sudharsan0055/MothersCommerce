from bs4 import BeautifulSoup

with open('index.html', 'r', encoding='utf-8') as f:
    soup = BeautifulSoup(f, 'html.parser')

wrapper = soup.find(class_='savon-mega-menu-wrapper')
if wrapper:
    links = wrapper.find_all('a', class_='nav-link')
    print('Links inside wrapper:', [l.text for l in links])
else:
    print('No wrapper found')
