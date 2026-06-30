import re

html_replacement = """
              <!-- TAB 1: INCENSE STICKS -->
              <div class="savon-panel active" id="tab-incense">
                <div class="incense-carousel-container">
                  <button class="carousel-nav carousel-prev" aria-label="Previous category"><i class="fa-solid fa-chevron-left"></i></button>
                  
                  <div class="incense-carousel">
                    
                    <!-- Card 1: Our Regular Incense -->
                    <div class="incense-card">
                      <h4>MOTHERS FRAGRANCES<br><span>OUR REGULAR INCENSE</span></h4>
                      <div class="incense-list-container">
                        <ul class="incense-list">
                          <li><a href="#">Amber</a></li>
                          <li><a href="#">Autumn Leaves</a></li>
                          <li><a href="#">Cinnamon & Spice</a></li>
                          <li><a href="#">Frankincense</a></li>
                          <li><a href="#">Gardenia</a></li>
                          <li><a href="#">Honeysuckle</a></li>
                          <li><a href="#">Jasmine</a></li>
                          <li><a href="#">Lavender</a></li>
                          <li><a href="#">Lotus</a></li>
                          <li><a href="#">Musk</a></li>
                          <li><a href="#">Myrrh</a></li>
                          <li><a href="#">Patchouli</a></li>
                          <li><a href="#">Orange blossom</a></li>
                          <li><a href="#">Oriental rose</a></li>
                          <li><a href="#">Passion Flower</a></li>
                          <li><a href="#">Patchouli Rose</a></li>
                          <li><a href="#">Roses</a></li>
                          <li><a href="#">Roses & Violets</a></li>
                          <li><a href="#">Spicewood</a></li>
                          <li><a href="#">Sandalwood</a></li>
                          <li><a href="#">Tuberose</a></li>
                          <li><a href="#">Vanilla</a></li>
                        </ul>
                      </div>
                    </div>

                    <!-- Card 2: Premium Incense -->
                    <div class="incense-card">
                      <h4>THE MOTHERS GOLDEN FRAGRANCES<br><span>PREMIUM INCENSE</span></h4>
                      <div class="incense-list-container">
                        <ul class="incense-list">
                          <li><a href="#">Amber</a></li>
                          <li><a href="#">Cinnamon</a></li>
                          <li><a href="#">Geranium</a></li>
                          <li><a href="#">Iris</a></li>
                          <li><a href="#">Jasmine</a></li>
                          <li><a href="#">Lavender</a></li>
                          <li><a href="#">Musk</a></li>
                          <li><a href="#">Lotus</a></li>
                          <li><a href="#">Myrrh</a></li>
                          <li><a href="#">Orange Blossom</a></li>
                          <li><a href="#">Rose</a></li>
                          <li><a href="#">Patchouli</a></li>
                          <li><a href="#">Spring blossom</a></li>
                          <li><a href="#">Vanilla</a></li>
                          <li><a href="#">Ylang Ylang</a></li>
                          <li><a href="#">Spicewood</a></li>
                        </ul>
                      </div>
                    </div>
                    
                    <!-- Card 3: Our Special Incense -->
                    <div class="incense-card">
                      <h4>MIRA AGARBATHIS<br><span>OUR SPECIAL INCENSE</span></h4>
                      <div class="incense-list-container">
                        <ul class="incense-list">
                          <li><a href="#">Cedarwood</a></li>
                          <li><a href="#">Coconut</a></li>
                          <li><a href="#">Chocolate</a></li>
                          <li><a href="#">Church Incense</a></li>
                          <li><a href="#">Christmas</a></li>
                          <li><a href="#">Coronation</a></li>
                          <li><a href="#">Lilac Lily of the Valley</a></li>
                          <li><a href="#">Opium</a></li>
                          <li><a href="#">Pine White Rose</a></li>
                          <li><a href="#">Wood lily</a></li>
                        </ul>
                      </div>
                    </div>

                    <!-- Card 4: Nagchampa Incense -->
                    <div class="incense-card">
                      <h4>MOTHER INDIA FRAGRANCES<br><span>NAGCHAMPA INCENSE</span></h4>
                      <div class="incense-list-container">
                        <ul class="incense-list">
                          <li><a href="#">Agni (Musk)</a></li>
                          <li><a href="#">Amrita</a></li>
                          <li><a href="#">Ananda</a></li>
                          <li><a href="#">Arjava</a></li>
                          <li><a href="#">Atma</a></li>
                          <li><a href="#">Bhakti (Rose)</a></li>
                          <li><a href="#">Ganesh</a></li>
                          <li><a href="#">Jyoti (Spicewood)</a></li>
                          <li><a href="#">Lakshmi</a></li>
                          <li><a href="#">Lila</a></li>
                          <li><a href="#">Moksha</a></li>
                          <li><a href="#">Lavanya</a></li>
                          <li><a href="#">OM</a></li>
                          <li><a href="#">Purusha</a></li>
                          <li><a href="#">Shanti</a></li>
                          <li><a href="#">Sattva</a></li>
                          <li><a href="#">Vishnu</a></li>
                          <li><a href="#">Yajna</a></li>
                          <li><a href="#">Hansa</a></li>
                        </ul>
                      </div>
                    </div>

                  </div>
                  
                  <button class="carousel-nav carousel-next" aria-label="Next category"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
              </div>
"""

css_additions = """
/* Reference Image Layout */
.incense-carousel-container {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 15px;
  position: relative;
  width: 100%;
}

.carousel-nav {
  background: #fff;
  border: 1px solid #e0dcd2;
  border-radius: 50%;
  width: 40px;
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  color: #777;
  transition: all 0.3s ease;
  flex-shrink: 0;
  box-shadow: 0 2px 5px rgba(0,0,0,0.05);
}
.carousel-nav:hover {
  background: #fbfaf8;
  color: var(--color-primary);
  border-color: var(--color-gold);
}

.incense-carousel {
  display: flex;
  gap: 25px;
  overflow-x: auto;
  scroll-behavior: smooth;
  scroll-snap-type: x mandatory;
  padding: 5px 2px;
  -ms-overflow-style: none;
  scrollbar-width: none;
  width: 100%;
  max-width: 700px;
}
.incense-carousel::-webkit-scrollbar {
  display: none;
}

.incense-card {
  flex: 0 0 calc(50% - 12.5px); 
  min-width: 320px;
  background: #fff;
  border: 1px solid #f0eee8;
  border-radius: 8px;
  padding: 25px;
  display: flex;
  flex-direction: column;
  height: 380px; 
  scroll-snap-align: start;
  box-shadow: 0 2px 10px rgba(0,0,0,0.02);
}

.incense-card h4 {
  font-family: var(--font-serif);
  font-size: 1.05rem;
  color: #3b5059; 
  text-transform: uppercase;
  letter-spacing: 0.05em;
  margin-bottom: 20px;
  border-bottom: 2px solid var(--color-gold);
  padding-bottom: 15px;
}

.incense-card h4 span {
  display: block;
  font-size: 0.85rem;
  color: #cc7a59; 
  margin-top: 8px;
  font-family: var(--font-sans);
  letter-spacing: 0.02em;
}

.incense-list-container {
  overflow-y: auto;
  flex-grow: 1;
  padding-right: 15px;
}

.incense-list-container::-webkit-scrollbar {
  width: 5px;
}
.incense-list-container::-webkit-scrollbar-track {
  background: #f7f6f2;
  border-radius: 4px;
}
.incense-list-container::-webkit-scrollbar-thumb {
  background: var(--color-gold);
  border-radius: 4px;
}

.incense-list {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  gap: 12px;
}
.incense-list a {
  text-decoration: none;
  color: #333;
  font-size: 0.95rem;
  transition: color 0.2s;
}
.incense-list a:hover {
  color: var(--color-terracotta);
}
"""

with open('index.html', 'r', encoding='utf-8') as f:
    html = f.read()

pattern = re.compile(r'<!-- TAB 1: INCENSE STICKS -->.*?<!-- TAB 2: BOTANICAL CONES -->', re.DOTALL)
if pattern.search(html):
    new_html = pattern.sub(html_replacement + '\n              <!-- TAB 2: BOTANICAL CONES -->', html)
    with open('index.html', 'w', encoding='utf-8') as f:
        f.write(new_html)
    print("Replaced HTML")
else:
    print("Could not find tab 1 in index.html")

with open('assets/css/styles.css', 'a', encoding='utf-8') as f:
    f.write('\n\n' + css_additions)
print("Appended CSS")
