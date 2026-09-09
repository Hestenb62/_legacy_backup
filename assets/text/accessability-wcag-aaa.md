# W3C Web Content Accessibility Guidelines (WCAG) 2.1 — Conformance Level AAA
**Standard Reference**: W3C Recommendation 05 June 2018  
**Permanent URI**: `https://www.w3.org/TR/WCAG21/#conformance-requirements`  
**Conformance Target**: Level AAA Success Criteria (Highest Accessibility Tier)

---

## Overview & Scope
Conformance Level AAA represents the highest and most rigorous tier of digital accessibility defined by the World Wide Web Consortium (W3C). While W3C notes that it is not recommended that Level AAA conformance be required as a blanket policy for entire sites because it is not possible to satisfy all Level AAA Success Criteria for some content, Hesten's Learning intentionally targets and fulfills key Level AAA criteria to support neurodivergent learners, students with dyslexia, and individuals with profound low vision.

---

## Principle 1: Perceivable — Level AAA Success Criteria

### 1.2.6 Sign Language (Prerecorded)
Sign language interpretation is provided for all prerecorded audio content in synchronized media.

### 1.2.7 Extended Audio Description (Prerecorded)
Where pauses in foreground audio are insufficient to allow audio descriptions to convey the sense of the video, extended audio description is provided for all prerecorded video content in synchronized media.

### 1.2.8 Media Alternative (Prerecorded)
An alternative for time-based media is provided for all prerecorded synchronized media and for all prerecorded video-only media.

### 1.2.9 Audio-only (Live)
An alternative for time-based media that presents equivalent information for live audio-only content is provided.

### 1.4.6 Contrast (Enhanced)
The visual presentation of text and images of text has a contrast ratio of at least **7:1**, except for the following:
* **Large Text**: Large-scale text and images of large-scale text have a contrast ratio of at least **4.5:1**;
* **Incidental**: Text or images of text that are part of an inactive user interface component, that are pure decoration, that are not visible to anyone, or that are part of a picture that contains significant other visual content, have no contrast requirement.
* **Logotypes**: Text that is part of a logo or brand name has no contrast requirement.

*Clinical Context*: Implemented on Hesten's Learning via the **High Contrast Theme** (`#000000` true black background with `#ffff00` pure yellow headings delivering an extraordinary **19.5:1** contrast ratio).

### 1.4.7 Low or No Background Audio
For prerecorded audio-only content that (1) contains primarily speech in the foreground, (2) is not an audio CAPTCHA or audio logo, and (3) is not vocalization intended to be primarily musical expression, at least one of the following is true:
* **No Background**: The audio does not contain background sounds.
* **Turn Off**: The background sounds can be turned off.
* **20 dB**: The background sounds are at least 20 decibels lower than the foreground speech content, with the exception of occasional sounds that last for only one or two seconds.

### 1.4.8 Visual Presentation
For the visual presentation of blocks of text, a mechanism is available to achieve each of the following:
1. Foreground and background colors can be selected by the user.
2. Width is no more than 80 characters or glyphs (40 if CJK).
3. Text is not justified (aligned to both the left and the right margins).
4. Line spacing (leading) is at least space-and-a-half within paragraphs, and paragraph spacing is at least 1.5 times larger than the line spacing.
5. Text can be resized without assistive technology up to 200 percent in a way that does not require the user to scroll horizontally to read a line of text on a full-screen window.

*Clinical Context*: This Success Criterion is the gold standard for dyslexia and low-vision reading. Hesten's Learning fulfills 1.4.8 through our Accessibility Settings panel (custom font size, line-height slider, left alignment toggles, and color overlays).

### 1.4.9 Images of Text (No Exception)
Images of text are only used for pure decoration or where a particular presentation of text is essential to the information being conveyed.

---

## Principle 2: Operable — Level AAA Success Criteria

### 2.1.3 Keyboard (No Exception)
All functionality of the content is operable through a keyboard interface without requiring specific timings for individual keystrokes.

### 2.2.3 No Timing
Timing is not an essential part of the event or activity presented by the content, except for non-interactive synchronized media and real-time events.

### 2.2.4 Interruptions
Interruptions can be postponed or suppressed by the user, except interruptions involving an emergency.

### 2.2.5 Re-authenticating
When an authenticated session expires, the user can continue the activity without loss of data after re-authenticating.

### 2.2.6 Timeouts
Users are warned of the duration of any user inactivity that could cause data loss, unless the data is preserved for more than 20 hours when the user does not take any actions.

### 2.3.2 Three Flashes
Web pages do not contain anything that flashes more than three times in any one second period (stricter than 2.3.1 with no threshold exceptions).

### 2.3.3 Animation from Interactions
Motion animation triggered by interaction can be disabled, unless the animation is essential to the functionality or the information being conveyed.

*Clinical Context*: Fulfillable via the **Stop Animations** toggle and CSS `@media (prefers-reduced-motion: reduce)` rules across the platform.

### 2.4.8 Location
Information about the user's location within a set of Web pages is available (e.g., dynamic hierarchical breadcrumbs).

### 2.4.9 Link Purpose (Link Only)
A mechanism is available to allow the purpose of each link to be identified from link text alone, except where the purpose of the link would be ambiguous to users in general.

### 2.4.10 Section Headings
Section headings are used to organize the content.

### 2.5.5 Target Size
The size of the target for pointer inputs is at least **44 by 44 CSS pixels** except when:
* **Equivalent**: The target is available through an equivalent link or control on the same page that is at least 44 by 44 CSS pixels;
* **Inline**: The target is in a sentence or block of text;
* **User Agent Control**: The size of the target is determined by the user agent and is not modified by the author;
* **Essential**: A particular presentation of the target is essential to the information being conveyed.

---

## Principle 3: Understandable — Level AAA Success Criteria

### 3.1.3 Unusual Words
A mechanism is available for identifying specific definitions of words or phrases used in an unusual or restricted way, including idioms and jargon.

*Clinical Context*: Implemented in Hesten's Learning story reader via inline vocabulary tooltips.

### 3.1.4 Abbreviations
A mechanism for identifying the expanded form or meaning of abbreviations is available.

### 3.1.5 Reading Level
When text requires reading ability more advanced than the lower secondary education level after removal of proper names and titles, supplemental content, or a version that does not require reading ability more advanced than the lower secondary education level, is available.

*Clinical Context*: Directly aligned with our Kindergarten through 6th grade graded levels, multi-tier Lexile readers, and Bionic Reading eye saccade guidance.

### 3.1.6 Pronunciation
A mechanism is available for identifying specific pronunciation of words where meaning of the words, in context, is ambiguous without knowing the pronunciation.

### 3.2.5 Change on Request
Changes of context are initiated only by user request or a mechanism is available to turn off such changes.

### 3.3.5 Help
Context-sensitive help is available.

### 3.3.6 Error Prevention (All)
For Web pages that require the user to submit information, at least one of the following is true: Reversible, Checked, Confirmed.
