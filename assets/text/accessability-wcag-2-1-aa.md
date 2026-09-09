# W3C Web Content Accessibility Guidelines (WCAG) 2.1 — Conformance Level AA
**Standard Reference**: W3C Recommendation 05 June 2018  
**Permanent URI**: `https://www.w3.org/TR/WCAG21/`  
**Conformance Target**: Level A & Level AA Success Criteria

---

## Overview & Scope
The Web Content Accessibility Guidelines (WCAG) 2.1 covers a wide range of recommendations for making Web content more accessible. Following these guidelines makes content accessible to a wider range of people with disabilities, including accommodations for blindness and low vision, deafness and hearing loss, limited movement, speech disabilities, photosensitivity, and combinations of these, and extends addressable criteria for learning disabilities and cognitive limitations.

---

## Principle 1: Perceivable
Information and user interface components must be presentable to users in ways they can perceive.

### Guideline 1.1 Text Alternatives
Provide text alternatives for any non-text content so that it can be changed into other forms people need, such as large print, braille, speech, symbols or simpler language.

* **1.1.1 Non-text Content (Level A)**: All non-text content that is presented to the user has a text alternative that serves the equivalent purpose, except for the situations listed below: Controls, Input; Time-Based Media; Tests; Sensory; CAPTCHA; Decoration, Formatting, Invisible.

### Guideline 1.2 Time-based Media
Provide alternatives for time-based media.

* **1.2.1 Audio-only and Video-only (Prerecorded) (Level A)**: For prerecorded audio-only and prerecorded video-only media, an alternative for time-based media is provided that presents equivalent information.
* **1.2.2 Captions (Prerecorded) (Level A)**: Captions are provided for all prerecorded audio content in synchronized media, except when the media is a media alternative for text and is clearly labeled as such.
* **1.2.3 Audio Description or Media Alternative (Prerecorded) (Level A)**: An alternative for time-based media or audio description of the prerecorded video content is provided for synchronized media.
* **1.2.4 Captions (Live) (Level AA)**: Captions are provided for all live audio content in synchronized media.
* **1.2.5 Audio Description (Prerecorded) (Level AA)**: Audio description is provided for all prerecorded video content in synchronized media.

### Guideline 1.3 Adaptable
Create content that can be presented in different ways (for example simpler layout) without losing information or structure.

* **1.3.1 Info and Relationships (Level A)**: Information, structure, and relationships conveyed through presentation can be programmatically determined or are available in text.
* **1.3.2 Meaningful Sequence (Level A)**: When the sequence in which content is presented affects its meaning, a correct reading sequence can be programmatically determined.
* **1.3.3 Sensory Characteristics (Level A)**: Instructions provided for understanding and operating content do not rely solely on sensory characteristics of components such as shape, color, size, visual location, orientation, or sound.
* **1.3.4 Orientation (Level AA)**: Content does not restrict its view and operation to a single display orientation, such as portrait or landscape, unless a specific display orientation is essential.
* **1.3.5 Identify Input Purpose (Level AA)**: The purpose of each input field collecting information about the user can be programmatically determined when the input field serves a purpose identified in the Input Purposes for User Interface Components section.

### Guideline 1.4 Distinguishable
Make it easier for users to see and hear content including separating foreground from background.

* **1.4.1 Use of Color (Level A)**: Color is not used as the only visual means of conveying information, indicating an action, prompting a response, or distinguishing a visual element.
* **1.4.2 Audio Control (Level A)**: If any audio on a Web page plays automatically for more than 3 seconds, either a mechanism is available to pause or stop the audio, or a mechanism is available to control audio volume independently from the overall system volume level.
* **1.4.3 Contrast (Minimum) (Level AA)**: The visual presentation of text and images of text has a contrast ratio of at least 4.5:1, except for Large Text (at least 3:1 for 18pt or 14pt bold), Incidental text, and Logotypes.
* **1.4.4 Resize text (Level AA)**: Except for captions and images of text, text can be resized without assistive technology up to 200 percent without loss of content or functionality.
* **1.4.5 Images of Text (Level AA)**: If the technologies being used can achieve the visual presentation, text is used to convey information rather than images of text except when the image of text is customizable or essential.
* **1.4.10 Reflow (Level AA)**: Content can be presented without loss of information or functionality, and without requiring scrolling in two dimensions for vertical scrolling content at a width equivalent to 320 CSS pixels; or horizontal scrolling content at a height equivalent to 256 CSS pixels.
* **1.4.11 Non-text Contrast (Level AA)**: The visual presentation of User Interface Components and Graphical Objects has a contrast ratio of at least 3:1 against adjacent color(s).
* **1.4.12 Text Spacing (Level AA)**: In content implemented using markup languages that support style properties, no loss of content or functionality occurs by setting all of the following: Line height (line spacing) to at least 1.5 times the font size; Spacing following paragraphs to at least 2 times the font size; Letter spacing (tracking) to at least 0.12 times the font size; Word spacing to at least 0.16 times the font size.
* **1.4.13 Content on Hover or Focus (Level AA)**: Where receiving and then dismissing pointer hover or keyboard focus triggers additional content to become visible and then hidden, the content is Dismissible, Hoverable, and Persistent.

---

## Principle 2: Operable
User interface components and navigation must be operable.

### Guideline 2.1 Keyboard Accessible
Make all functionality available from a keyboard.

* **2.1.1 Keyboard (Level A)**: All functionality of the content is operable through a keyboard interface without requiring specific timings for individual keystrokes, except where the underlying function requires input that depends on the path of the user's movement and not just the endpoints.
* **2.1.2 No Keyboard Trap (Level A)**: If keyboard focus can be moved to a component of the page using a keyboard interface, then focus can be moved away from that component using only a keyboard interface, and, if it requires more than unmodified arrow or tab keys or other standard exit methods, the user is advised of the method for moving focus away.
* **2.1.4 Character Key Shortcuts (Level A)**: If a keyboard shortcut is implemented in content using only letter (including upper and lower case letters), punctuation, number, or symbol characters, then at least one mechanism is available to turn the shortcut off, remap the shortcut, or make it active only on focus.

### Guideline 2.2 Enough Time
Provide users enough time to read and use content.

* **2.2.1 Timing Adjustable (Level A)**: For each time limit that is set by the content, at least one of the following is true: Turn off, Adjust, Extend (at least 10 times the default), Real-time Exception, Essential Exception, 20 Hour Exception.
* **2.2.2 Pause, Stop, Hide (Level A)**: For moving, blinking, scrolling, or auto-updating information, mechanisms are provided to pause, stop, or hide it.

### Guideline 2.3 Seizures and Physical Reactions
Do not design content in a way that is known to cause seizures or physical reactions.

* **2.3.1 Three Flashes or Below Threshold (Level A)**: Web pages do not contain anything that flashes more than three times in any one second period, or the flash is below the general flash and red flash thresholds.

### Guideline 2.4 Navigable
Provide ways to help users navigate, find content, and determine where they are.

* **2.4.1 Bypass Blocks (Level A)**: A mechanism is available to bypass blocks of content that are repeated on multiple Web pages (e.g., skip-to-content links).
* **2.4.2 Page Titled (Level A)**: Web pages have titles that describe topic or purpose.
* **2.4.3 Focus Order (Level A)**: If a Web page can be navigated sequentially and the navigation sequences affect meaning or operation, focusable components receive focus in an order that preserves meaning and operability.
* **2.4.4 Link Purpose (In Context) (Level A)**: The purpose of each link can be determined from the link text alone or from the link text together with its programmatically determined link context.
* **2.4.5 Multiple Ways (Level AA)**: More than one way is available to locate a Web page within a set of Web pages except where the Web Page is the result of, or a step in, a process.
* **2.4.6 Headings and Labels (Level AA)**: Headings and labels describe topic or purpose.
* **2.4.7 Focus Visible (Level AA)**: Any keyboard operable user interface has a mode of operation where the keyboard focus indicator is visible.

### Guideline 2.5 Input Modalities
Make it easier for users to operate functionality through various inputs beyond keyboard.

* **2.5.1 Pointer Gestures (Level A)**: All functionality that uses multipoint or path-based gestures for operation can be operated with a single pointer without a path-based gesture, unless a multipoint or path-based gesture is essential.
* **2.5.2 Pointer Cancellation (Level A)**: For functionality that can be operated using a single pointer, at least one of the following is true: No Down-Event, Abort or Undo, Up Reversal, Essential.
* **2.5.3 Label in Name (Level A)**: For user interface components with labels that include text or images of text, the name contains the text that is presented visually.
* **2.5.4 Motion Actuation (Level A)**: Functionality that can be operated by device motion or user motion can also be operated by user interface components and responding to the motion can be disabled.

---

## Principle 3: Understandable
Information and the operation of user interface must be understandable.

### Guideline 3.1 Readable
Make text content readable and understandable.

* **3.1.1 Language of Page (Level A)**: The default human language of each Web page can be programmatically determined.
* **3.1.2 Language of Parts (Level AA)**: The human language of each passage or phrase in the content can be programmatically determined except for proper names, technical terms, words of indeterminate language, and words or phrases that have become part of the vernacular of the immediately surrounding text.

### Guideline 3.2 Predictable
Make Web pages appear and operate in predictable ways.

* **3.2.1 On Focus (Level A)**: When any user interface component receives focus, it does not initiate a change of context.
* **3.2.2 On Input (Level A)**: Changing the setting of any user interface component does not automatically cause a change of context unless the user has been advised of the behavior before using the component.
* **3.2.3 Consistent Navigation (Level AA)**: Navigational mechanisms that are repeated on multiple Web pages within a set of Web pages occur in the same relative order each time they are repeated, unless a change is initiated by the user.
* **3.2.4 Consistent Identification (Level AA)**: Components that have the same functionality within a set of Web pages are identified consistently.

### Guideline 3.3 Input Assistance
Help users avoid and correct mistakes.

* **3.3.1 Error Identification (Level A)**: If an input error is automatically detected, the item that is in error is identified and the error is described to the user in text.
* **3.3.2 Labels or Instructions (Level A)**: Labels or instructions are provided when content requires user input.
* **3.3.3 Error Suggestion (Level AA)**: If an input error is automatically detected and suggestions for correction are known, then the suggestions are provided to the user, unless it would jeopardize the security or purpose of the content.
* **3.3.4 Error Prevention (Legal, Financial, Data) (Level AA)**: For Web pages that cause legal commitments or financial transactions, that modify or delete user-controllable data, or that submit user test responses, submissions are reversible, verified, or confirmed before finalization.

---

## Principle 4: Robust
Content must be robust enough that it can be reliably interpreted by a wide variety of user agents, including assistive technologies.

### Guideline 4.1 Compatible
Maximize compatibility with current and future user agents, including assistive technologies.

* **4.1.1 Parsing (Level A)**: In content implemented using markup languages, elements have complete start and end tags, elements are nested according to their specifications, elements do not contain duplicate attributes, and any IDs are unique, except where the specifications allow these features.
* **4.1.2 Name, Role, Value (Level A)**: For all user interface components (including form elements, links, and components generated by scripts), the name and role can be programmatically determined; states, properties, and values that can be set by the user can be programmatically set; and notification of changes to these items is available to user agents, including assistive technologies.
* **4.1.3 Status Messages (Level AA)**: In content implemented using markup languages, status messages can be programmatically determined through role or properties such that they can be presented to the user by assistive technologies without receiving focus.
