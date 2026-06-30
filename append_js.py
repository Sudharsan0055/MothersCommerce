js_code = """
document.addEventListener('DOMContentLoaded', function() {
  // Savon Mega Menu Tabs
  const savonTabs = document.querySelectorAll('.savon-tab');
  const savonPanels = document.querySelectorAll('.savon-panel');

  if(savonTabs.length > 0) {
    savonTabs.forEach(tab => {
      tab.addEventListener('mouseenter', function(e) {
        
        // Remove active class from all tabs and panels
        savonTabs.forEach(t => t.classList.remove('active'));
        savonPanels.forEach(p => p.classList.remove('active'));
        
        // Add active class to clicked tab
        this.classList.add('active');
        
        // Show corresponding panel
        const targetId = this.getAttribute('data-target');
        const targetPanel = document.getElementById(targetId);
        if (targetPanel) {
          targetPanel.classList.add('active');
        }
      });
    });
  }
});
"""

with open('assets/js/main.js', 'a', encoding='utf-8') as f:
    f.write('\n\n' + js_code)
print("JS appended.")
