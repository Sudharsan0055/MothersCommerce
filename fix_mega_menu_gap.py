with open('assets/css/styles.css', 'a', encoding='utf-8') as f:
    f.write('''
/* --- FIX MEGA MENU GAP --- */
.has-mega-menu {
  /* Extend the hover area down to the absolute menu so it doesn't close when moving mouse */
  padding-bottom: 40px;
  margin-bottom: -40px;
}
''')
print("Fixed mega menu gap.")
