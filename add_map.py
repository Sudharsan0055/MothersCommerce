import os

with open('contact.html', 'r', encoding='utf-8') as f:
    content = f.read()

map_section = """
  <!-- Google Map Section -->
  <section style="width: 100%; height: 450px; margin-top: 2rem;">
    <iframe src="https://maps.google.com/maps?q=Mothers%20Commerce,%20Montorsier%20St,%20Pondicherry&t=&z=16&ie=UTF8&iwloc=&output=embed" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </section>
</main>
"""

new_content = content.replace('</main>', map_section)

with open('contact.html', 'w', encoding='utf-8') as f:
    f.write(new_content)
