from PIL import Image

# Open the image
img = Image.open(r'C:\Users\kamar\Downloads\Mothers\assets\images\logo-original.webp').convert('RGBA')
data = img.getdata()

new_data = []
gold = (212, 175, 55)

for item in data:
    # Calculate lightness from RGB channels
    l = sum(item[:3]) / 3
    
    # Calculate new alpha: white background (l=255) becomes transparent (a_new=0)
    # Dark lines (l=0) retain their original alpha but become solid gold
    a_new = int(item[3] * ((255 - l) / 255))
    
    # Append the golden pixel with the calculated alpha
    new_data.append((gold[0], gold[1], gold[2], a_new))

img.putdata(new_data)
img.save(r'C:\Users\kamar\Downloads\Mothers\assets\images\lotus-logo-golden.webp', 'WEBP')
