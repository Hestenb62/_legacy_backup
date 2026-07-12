import os
import re

def process_file(filepath):
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    # Generic Replacements for common layouts
    replacements = [
        (r'class="container mx-auto px-4( py-12| py-8)?( min-h-\[.*?\])?( mb-\d+)?"', r'class="page-content-wrapper"'),
        (r'class="text-4xl md:text-5xl font-extrabold.*?"', r'class="page-title"'),
        (r'class="text-text-secondary max-w-2xl text-lg font-medium.*?"', r'class="page-subtitle"'),
        (r'class="bg-content-bg.*?rounded.*?shadow.*?"', r'class="legal-content"'),
        (r'class="text-2xl font-bold.*?text-text-default.*?"', r'class="settings-section-title"'),
        (r'class="relative bg-gradient-to-br.*?text-white.*?"', r'class="page-hero"'),
        (r'class="absolute inset-0 overflow-hidden pointer-events-none.*?"', r'class="page-hero-bg"'),
        (r'class="relative z-10 max-w-3xl mx-auto text-center"', r'class="page-hero-content"'),
        (r'class="inline-block py-1 px-3 rounded-full bg-white/10.*?"', r'class="page-hero-badge"'),
        (r'class="text-xl text-gray-300 font-light"', r'class="page-hero-subtitle"'),
        (r'class="text-4xl md:text-6xl font-extrabold.*?"', r'class="page-hero-title"')
    ]

    new_content = content
    for pattern, replacement in replacements:
        new_content = re.sub(pattern, replacement, new_content)

    if new_content != content:
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(new_content)
        print(f"Updated {filepath}")

for root, _, files in os.walk('.'):
    for file in files:
        if file.endswith('.php') and file not in ['header.php', 'footer.php', 'index.php', 'about.php', 'contact.php', 'mission.php', 'curriculum.php', 'games.php', 'privacy.php', 'terms-of-use.php', 'help-center.php', 'search.php', 'settings.php']:
            process_file(os.path.join(root, file))

print("Done")
