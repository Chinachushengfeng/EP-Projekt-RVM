

// bip sound
// http://soundbible.com/mp3/A-Tone-His_Self-1266414414.mp3

(function (factory) {

  // checking for exports avalible
  if (typeof module !== 'undefined' && module.exports) {
    // export Collection
    module.exports = factory
  } else {
    // else add to root variable
    window['naranja'] = factory
  }

})(function () {

  function setSideUpAnimation (finalNotification) {
    setTimeout(function () {

      var notificaciónHeight = finalNotification
        .querySelector('.naranja-body-notification')
        .offsetHeight

      finalNotification.style.height = notificaciónHeight + 'px'
    }, 0)
  }

  function createText (text) {
    return document.createTextNode(text)
  }

  /**
  * provide a reusable way to create html
  * elements
  * @param tag String – html tag name
  * @param classes Array<String> – html tag classes
  */

  function createElement (tag, classes) {
    var $HTMLElement = document.createElement(tag)
    if ( !!classes ) {
      classes.forEach(function (className) {
        $HTMLElement.classList.add(className)
      })
    }

    return $HTMLElement
  }

  var $narjContainer = document.querySelector('.naranja-notification-box')

  if (!$narjContainer) {
    $narjContainer = createElement('div', ['naranja-notification-box'])
    $newNotificationsAdvice = createElement('div', ['naranja-notification-advice'])
    $newNotificationsAdvice.addEventListener('click', function () {
      $narjContainer.scrollTop = '0'
    })
    $narjContainer.appendChild($newNotificationsAdvice)

    document.body.appendChild($narjContainer)
  }

  $narjContainer.__proto__.unshifElement = function (node) {
    this.insertBefore(node, this.childNodes[0])
  }

  $narjContainer.addEventListener('scroll', function (e) {
    if (e.currentTarget.scrollTop < 20) {
      $newNotificationsAdvice.classList.remove('active')
    }
  })

  return {
    log: function (argm) {
      this.createNotification('log', argm)
    },
    success: function (argm) {
      this.createNotification('success', argm)
    },
    warn: function (argm) {
      this.createNotification('warn', argm)
    },
    error: function (argm) {
      this.createNotification('error', argm)
    },

    /*
    * Internal methods for
    * launch notifications
    */
    createNotification: function (type, argm) {

      this.type = type
      this.title = argm.title
      this.textch = argm.textch
      this.texten = argm.texten
      this.icon = (argm.icon === undefined) ? true : argm.icon
      this.buttons = argm.buttons

      var $notification = this.$createContainer()
      var $body = $notification.querySelector('div')

      this.$notification = $notification
      this.$body = $body

      // render icon if exists
      if (this.icon) {
        var $iconContainer = createElement('div', [
          'naranja-icon',
          'narj-icon-' + type
        ])

        $iconContainer.innerHTML = this.chooseIcon[type]

        $body.appendChild($iconContainer)
      }

      var $title = this.createTitle()
      var $textch = this.createTextCh()
      var $texten = this.createTextEn()

      var $textAndTitleContainer = createElement('div', [
        'naranja-text-and-title'
      ])

      $textAndTitleContainer.appendChild($title)
      $textAndTitleContainer.appendChild($textch)
      $textAndTitleContainer.appendChild($texten)

      $body.appendChild($textAndTitleContainer)

      // render buttons fragment if exists
      if (this.buttons) {
        var $buttons = this.createButtons($notification, $body)

        $body
          .querySelector('.naranja-text-and-title')
          .appendChild($buttons)
      }


      var $close = createElement('div', [
        'naranja-close-icon'
      ])

      $close.addEventListener('click', (function () {
        this.closeNotification()
      }).bind(this))

      // var $close = document.createElement('div')
      // $close.classList.add('naranja-close-icon')
      //$close.innerHTML = this.chooseIcon.close

      $body.appendChild($close)

      $narjContainer.unshifElement($notification)
      setSideUpAnimation($notification)

      if ($narjContainer.scrollTop > 20) {
        $newNotificationsAdvice.classList.add('active')
        $newNotificationsAdvice.innerHTML = this.chooseIcon.newNotification
      }

      if (argm.timeout !== 'keep') {
        setTimeout(
          (function () {
            this.closeNotification()
          }).bind(this),
          argm.timeout || 5000
        )
      }
    },
    $createContainer: function () {
      // generate box for notification

      var $container = createElement('div', [
        'naranja-notification',
        'naranja-' + this.type
      ])

      var $innerContainer = createElement('div', [
        'naranja-body-notification',
        'narj-' + this.type
      ])

      $container.appendChild($innerContainer)

      return $container
    },
    createTitle: function () {
      var $parragraph = createElement('p', [
        'naranja-title'
      ])
      var $tt = createText(this.title)
      $parragraph.appendChild($tt)

      return $parragraph
    },
    createTextCh: function () {
      var $title = createElement('p', [
        'naranja-parragraph-ch'
      ])

      var $tx = document.createTextNode(this.textch)
      $title.appendChild($tx)

      return $title
    },
    createTextEn: function () {
      var $title = createElement('p', [
        'naranja-parragraph-en'
      ])

      var $tx = document.createTextNode(this.texten)
      $title.appendChild($tx)

      return $title
    },
    createButtons: function ($notification, $body) {
      var $buttonsContainer = createElement('div', [
        'naranja-buttons-container'
      ])

      var self = this

      this.buttons.forEach(function (button) {
        var $buttonElement = createElement('button')
        $buttonElement.appendChild(document.createTextNode(button.text))

        $buttonElement.addEventListener('click', function (event) {

          self.removeNotification = true
          event.preventClose = function () {
            self.removeNotification = false
          }

          event.closeNotification = function () {
            self.closeNotification()
          }

          button.click(event)

          if (self.removeNotification) self.closeNotification()
        })

        $buttonsContainer.appendChild($buttonElement)
      })

      return $buttonsContainer
    },
    closeNotification: function () {
      var self = this
      if ( !this.elementWasRemoved ) {
        self.$body.style.opacity = '0'
        setTimeout(function () {
          self.$body.style.marginTop = '0px'
          self.$body.style.marginBottom = '0px'
          self.$body.style.padding = '0px'
          self.$notification.style.height = 0 + 'px'
          self.$notification.style.padding = 0 + 'px'
          setTimeout(function () {
            self.$notification
              .parentNode
              .removeChild(
                self.$notification
              )
          }, 600);
          if ($narjContainer.scrollTop < 20) {
            $newNotificationsAdvice.classList.remove('active')
          }
        }, 150)
      }
      this.elementWasRemoved = true
    },
    chooseIcon: {
      log: '<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="24" cy="24" r="24" fill="#EEEEEE"/><path d="M26.595 37.5C26.3313 37.9546 25.9528 38.332 25.4973 38.5943C25.0419 38.8566 24.5256 38.9947 24 38.9947C23.4744 38.9947 22.9581 38.8566 22.5027 38.5943C22.0472 38.332 21.6687 37.9546 21.405 37.5M39 31.5H9C10.1935 31.5 11.3381 31.0259 12.182 30.182C13.0259 29.3381 13.5 28.1935 13.5 27V19.5C13.5 16.7152 14.6062 14.0445 16.5754 12.0754C18.5445 10.1062 21.2152 9 24 9C26.7848 9 29.4555 10.1062 31.4246 12.0754C33.3938 14.0445 34.5 16.7152 34.5 19.5V27C34.5 28.1935 34.9741 29.3381 35.818 30.182C36.6619 31.0259 37.8065 31.5 39 31.5V31.5Z" stroke="black" stroke-opacity="0.73" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',

      success: '<svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="50" fill="#6ED69A" fill-opacity="0.62"/><path d="M75 34.4L40.6 68.7L25 53.1" stroke="#11B674" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"/></svg>',

      warn: '<svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" ><circle cx="50" cy="50" r="50" fill="#F5CE69"/><path d="M50.00 34.38C51.73 34.38 53.13 35.77 53.13 37.50V50.00C53.13 51.73 51.73 53.13 50.00 53.13C48.27 53.13 46.88 51.73 46.88 50.00V37.50C46.88 35.77 48.27 34.38 50.00 34.38Z" fill="#DCA14E"/><path d="M53.13 59.38C53.13 57.65 51.73 56.25 50.00 56.25C48.27 56.25 46.88 57.65 46.88 59.38V62.50C46.88 64.23 48.27 65.63 50.00 65.63C51.73 65.63 53.13 64.23 53.13 62.50V59.38Z" fill="#DCA14E"/><path fill-rule="evenodd" clip-rule="evenodd" d="M15.63 50.00C15.63 31.02 31.02 15.63 50.00 15.63C68.98 15.63 84.38 31.02 84.38 50.00C84.38 68.98 68.98 84.38 50.00 84.38C31.02 84.38 15.63 68.98 15.63 50.00ZM50.00 21.88C34.47 21.88 21.88 34.47 21.88 50.00C21.88 65.53 34.47 78.13 50.00 78.13C65.53 78.13 78.13 65.53 78.13 50.00C78.13 34.47 65.53 21.88 50.00 21.88Z " fill="#DCA14E"/></svg>',

      error: '<svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="50" fill="#ED8476"/><path d="M70.96 33.46C72.18 32.24 72.18 30.26 70.96 29.04C69.74 27.82 67.76 27.82 66.54 29.04L50.00 45.58L33.46 29.04C32.24 27.82 30.26 27.82 29.04 29.04C27.82 30.26 27.82 32.24 29.04 33.46L45.58 50.00L29.04 66.54C27.82 67.76 27.82 69.74 29.04 70.96C30.26 72.18 32.24 72.18 33.46 70.96L50.00 54.42L66.54 70.96C67.76 72.18 69.74 72.18 70.96 70.96C72.18 69.74 72.18 67.76 70.96 66.54L54.42 50.00L70.96 33.46Z" fill="#C54F4F"/></svg>',

      close: '<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.70711 1.7071C10.0976 1.31659 10.0976 0.683407 9.70711 0.292889C9.31659 -0.0976295 8.68341 -0.0976295 8.29289 0.292889L5 3.58578L1.70711 0.292889C1.31659 -0.0976295 0.68342 -0.0976295 0.292894 0.292889C-0.0976315 0.683407 -0.0976315 1.31659 0.292894 1.7071L3.58579 5L0.292894 8.29289C-0.0976315 8.68341 -0.0976315 9.31659 0.292894 9.7071C0.68342 10.0976 1.31659 10.0976 1.70711 9.7071L5 6.41421L8.29289 9.7071C8.68341 10.0976 9.31659 10.0976 9.70711 9.7071C10.0976 9.31659 10.0976 8.68341 9.70711 8.29289L6.41422 5L9.70711 1.7071Z" fill="black" fill-opacity="0.37"/></svg>',

      newNotification: '<svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg"><g filter="url(#filter0_d)"><circle cx="20.5" cy="16.5" r="16.5" fill="#C08AE1"/></g><path d="M13 21L21 13L29 21" stroke="black" stroke-opacity="0.6" stroke-width="3"/><defs><filter id="filter0_d" x="0" y="0" width="41" height="41" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/><feOffset dy="4"/><feGaussianBlur stdDeviation="2"/><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/><feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/><feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/></filter></defs></svg>'
    }
  }
})
