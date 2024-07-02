---
layout:
  title:
    visible: true
  description:
    visible: false
  tableOfContents:
    visible: true
  outline:
    visible: true
  pagination:
    visible: true
---

# 🛞 Explanation

Once the project has been set up, you can access the project home page:

{% embed url="http://lucky-wheel.alexis-gousseau.com/" %}
Lucky Wheel - home page link
{% endembed %}

When you arrive on this page, you will be confronted with a simple text field.

## Values

To make the wheel work, you need to enter values in a specific format, which corresponds to a concatenation of words separated by a comma. It's a simple, user-friendly way of entering multiple pieces of information at the same time.

<figure><img src="../.gitbook/assets/input_entered_values.png" alt=""><figcaption><p>Lucky Wheel - entering values</p></figcaption></figure>

Once the values have been entered and the form sent, the same information is retrieved via the _**selection**_ parameter in the url, given that the sending method is GET. In this way, the user can save or share the link with the values already entered, and spin the wheel directly.

<figure><img src="../.gitbook/assets/image.png" alt=""><figcaption><p>Lucky Wheel - url parameter</p></figcaption></figure>

## Chart

Once the values have been entered and sent, the graph is constructed using them, and the user can spin the wheel of fortune by clicking on the central _**SPIN**_ button.

<figure><img src="../.gitbook/assets/wheel.gif" alt=""><figcaption><p>Lucky Wheel - chart of the wheel</p></figcaption></figure>

When this action is executed, a rotation is applied not to the graphic in the canvas, but rather to the canvas itself, to give the illusion that the wheel is rotating.

At this stage of the project, I found it a shame to have to correct the values entered to obtain a new wheel with the correct information. That's why I added a system for managing these values, allowing the user to activate or deactivate one of them with a single click, and then update the wheel of luck.

<figure><img src="../.gitbook/assets/values_list.png" alt=""><figcaption><p>Lucky Wheel - values manager</p></figcaption></figure>

Since only one person worked on it, project management was necessary to centralize ideas, bugs and evolutions.
