function Accordion(obj) {

  if (!document.querySelector(`#${obj.wrap_id}`)) {
    return false
  }

  const ElmItems = document.querySelectorAll(`#${obj.wrap_id} .${obj.item_class}`)
  const ClassAccordionElm = obj.accordion_class
  const ElmAccordions = document.querySelectorAll(`#${obj.wrap_id} .${ClassAccordionElm}`)
  const Transition = obj.accordion_transition ? obj.accordion_transition : '.4s'
  const AttrToggle = obj.toggle_attr ? obj.toggle_attr : 'data-active'
  const DefaultOpen = obj.default_is_open ? obj.default_is_open : false
  let arryAccordionElmHeight = new Array()

  Array.from(ElmAccordions).forEach(element => {
    element.style.height = 'auto'
    element.style.overflow = 'hidden'
    element.style.transition = Transition
    arryAccordionElmHeight.push(element.clientHeight)
    if (!DefaultOpen) {
      element.style.height = '0'
    }
  })

  Array.from(ElmItems).forEach((element, index) => {
    if (DefaultOpen) {
      element.setAttribute(AttrToggle, '')
      ElmAccordions[index].style.height = `${arryAccordionElmHeight[index]}px`
    }

    element.addEventListener('click', (event) => {

      let target = event.currentTarget
      let hasAttr = target.hasAttribute(AttrToggle)
      let elmAccordion

      target.childNodes.forEach(childItem => {
        if (childItem.className == ClassAccordionElm) {
          elmAccordion = childItem
        }
      })

      if (hasAttr) {
        target.removeAttribute(AttrToggle)
        elmAccordion.style.height = '0'
      } else {
        target.setAttribute(AttrToggle, '')
        elmAccordion.style.height = `${arryAccordionElmHeight[index]}px`
      }

    })
  })

}

Accordion({
  wrap_id: 'first-accordion',
  item_class: 'accordion-item',
  accordion_class: 'accordion-content',
  accordion_transition: '.4s',
  toggle_attr: 'data-active',
})





