import os

with open('index.html', 'r', encoding='utf-8') as f:
    index_content = f.read()

# Extract header and footer
# split at <main> and </main>

header_split = index_content.split('<main>')
if len(header_split) != 2:
    print("Failed to find main")
header_part = header_split[0]
footer_part = index_content.split('</main>')[1]

# Title change
header_part = header_part.replace("<title>Mothers Fragrances | The True Craft of Natural Incense</title>", "<title>Contact Us - The Mother's Fragrances</title>")
# Modify nav link to be active
header_part = header_part.replace('<a href="contact.html" class="nav-link">', '<a href="contact.html" class="nav-link active">')
header_part = header_part.replace('<a href="index.html" class="nav-link active">', '<a href="index.html" class="nav-link">')

main_content = """<main class="main">
    <section class="section" style="padding-top: 150px; background-color: var(--color-bg);">
      <div class="container">
        <div style="text-align: center; margin-bottom: 3rem;">
          <span class="product-tag">Get in Touch</span>
          <h1 style="color: var(--color-primary); font-size: 3rem; margin-top: 1rem;">Contact Us</h1>
          <p style="color: var(--color-text-light); max-width: 600px; margin: 1rem auto; line-height: 1.6;">We're always eager to hear from you! You can call us during working hours or visit our office. All emails will get a response within 24 hours.</p>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: start;">
          <!-- Contact Info -->
          <div>
            <div style="background: rgba(30,58,43,0.03); padding: 2.5rem; border-radius: var(--radius-md); border: 1px solid var(--color-border); margin-bottom: 2rem;">
              <h3 style="color: var(--color-primary); margin-bottom: 1.5rem; font-size: 1.5rem;">Head Office (India)</h3>
              <p style="margin-bottom: 1.5rem; line-height: 1.6; color: var(--color-text);"><strong>M/s. Mother's Commerce Company Pvt. Ltd.</strong><br>No.40, 1st Floor, Montorsier Street, Pondicherry &ndash; 605 001.</p>
              
              <div style="margin-bottom: 0.8rem; display: flex; align-items: center;"><i class="fa-solid fa-phone" style="color: var(--color-terracotta); width: 30px; font-size: 1.2rem;"></i> +91 413-2333 349</div>
              <div style="margin-bottom: 0.8rem; display: flex; align-items: center;"><i class="fa-solid fa-phone" style="color: var(--color-terracotta); width: 30px; font-size: 1.2rem;"></i> +91 413-2342 442</div>
              <div style="margin-bottom: 0.8rem; display: flex; align-items: center;"><i class="fa-solid fa-fax" style="color: var(--color-terracotta); width: 30px; font-size: 1.2rem;"></i> +91 413-2330 603</div>
              <div style="margin-bottom: 0.8rem; display: flex; align-items: center;"><i class="fa-solid fa-envelope" style="color: var(--color-terracotta); width: 30px; font-size: 1.2rem;"></i> motherscommerce@gmail.com</div>
              <div style="margin-bottom: 1.5rem; display: flex; align-items: center;"><i class="fa-solid fa-globe" style="color: var(--color-terracotta); width: 30px; font-size: 1.2rem;"></i> www.mothersfragrances.com</div>
            </div>
            
            <div style="background: var(--color-surface); padding: 2.5rem; border-radius: var(--radius-md); border: 1px solid var(--color-border); box-shadow: var(--shadow-sm);">
              <h3 style="color: var(--color-primary); margin-bottom: 1.5rem; font-size: 1.5rem;">Send a Message</h3>
              <form>
                <div style="margin-bottom: 1rem;">
                  <label style="display: block; font-size: 0.85rem; color: var(--color-primary); font-weight: 600; margin-bottom: 0.5rem;">Name</label>
                  <input type="text" style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: var(--radius-sm); font-family: inherit;">
                </div>
                <div style="margin-bottom: 1rem;">
                  <label style="display: block; font-size: 0.85rem; color: var(--color-primary); font-weight: 600; margin-bottom: 0.5rem;">Email</label>
                  <input type="email" style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: var(--radius-sm); font-family: inherit;">
                </div>
                <div style="margin-bottom: 1rem;">
                  <label style="display: block; font-size: 0.85rem; color: var(--color-primary); font-weight: 600; margin-bottom: 0.5rem;">Message</label>
                  <textarea rows="4" style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-border); border-radius: var(--radius-sm); font-family: inherit; resize: vertical;"></textarea>
                </div>
                <button type="button" class="btn btn-primary" style="width: 100%;">Send Message</button>
              </form>
            </div>
          </div>

          <!-- Worldwide Distributors -->
          <div>
            <h3 style="color: var(--color-primary); margin-bottom: 2rem; font-size: 1.8rem;">Worldwide Distributors</h3>
            
            <div style="margin-bottom: 2.5rem; padding-bottom: 1.5rem; border-bottom: 1px solid var(--color-border);">
              <h4 style="color: var(--color-terracotta); margin-bottom: 0.8rem; font-size: 1.2rem;">Mere Cie Deux (USA)</h4>
              <p style="color: var(--color-text-light); line-height: 1.6; margin-bottom: 0.8rem;">Tara Haack, 123 River Road Claremont, NH 03743 USA</p>
              <div style="display: flex; gap: 1.5rem; color: var(--color-text); font-size: 0.9rem;">
                <span><i class="fa-solid fa-phone" style="color: var(--color-terracotta); margin-right: 5px;"></i> 206-276-5945</span>
                <span><i class="fa-solid fa-envelope" style="color: var(--color-terracotta); margin-right: 5px;"></i> info@mereciedeux.com</span>
              </div>
            </div>

            <div style="margin-bottom: 2.5rem; padding-bottom: 1.5rem; border-bottom: 1px solid var(--color-border);">
              <h4 style="color: var(--color-terracotta); margin-bottom: 0.8rem; font-size: 1.2rem;">Greater Goods (UK)</h4>
              <p style="color: var(--color-text-light); line-height: 1.6; margin-bottom: 0.8rem;">Greater Goods Ltd, 44 Rock Road, Midsomer Norton, BA3 2AQ</p>
              <div style="display: flex; gap: 1.5rem; color: var(--color-text); font-size: 0.9rem;">
                <span><i class="fa-solid fa-fax" style="color: var(--color-terracotta); margin-right: 5px;"></i> 01761 / 417040</span>
                <span><i class="fa-solid fa-envelope" style="color: var(--color-terracotta); margin-right: 5px;"></i> info@greatergoods.co.uk</span>
              </div>
            </div>

            <div style="margin-bottom: 2.5rem; padding-bottom: 1.5rem; border-bottom: 1px solid var(--color-border);">
              <h4 style="color: var(--color-terracotta); margin-bottom: 0.8rem; font-size: 1.2rem;">M/s. Exotic Designers & Importers (Australia)</h4>
              <p style="color: var(--color-text-light); line-height: 1.6; margin-bottom: 0.8rem;">Unit 3-23 Dudgeons Lane Bangalow NSW 2479 AUSTRALIA</p>
              <div style="display: flex; gap: 1.5rem; color: var(--color-text); font-size: 0.9rem;">
                <span><i class="fa-solid fa-phone" style="color: var(--color-terracotta); margin-right: 5px;"></i> 0427 85 88 35</span>
                <span><i class="fa-solid fa-envelope" style="color: var(--color-terracotta); margin-right: 5px;"></i> exoticdesigners@hotmail.com</span>
              </div>
            </div>

            <div style="margin-bottom: 2.5rem;">
              <h4 style="color: var(--color-terracotta); margin-bottom: 0.8rem; font-size: 1.2rem;">M/s. Mira International (Netherlands)</h4>
              <p style="color: var(--color-text-light); line-height: 1.6; margin-bottom: 0.8rem;">Achterwerf 312, 1357 DG Almere Haven, The Netherlands.</p>
              <div style="display: flex; gap: 1.5rem; color: var(--color-text); font-size: 0.9rem;">
                <span><i class="fa-solid fa-phone" style="color: var(--color-terracotta); margin-right: 5px;"></i> +00-31-36-5400183</span>
                <span><i class="fa-solid fa-envelope" style="color: var(--color-terracotta); margin-right: 5px;"></i> miraint@worldonline.nl</span>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  </main>"""

new_contact = header_part + main_content + footer_part

with open('contact.html', 'w', encoding='utf-8') as f:
    f.write(new_contact)
