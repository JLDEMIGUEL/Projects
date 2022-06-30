describe('Comprobar login', () => {
  it('Comprobar login', () => {
    cy.visit('/login')

    cy.get('[data-cy="heading-login"]').should('exist')


    //Submit
    cy.get('[data-cy="formulario-login"]').submit()
    cy.get('[data-cy="alerta-login"]').should('have.length',2)

    //Introducir campos
    cy.get('[data-cy="correo"]').type('correo@correo.com')

    //Submit
    cy.get('[data-cy="formulario-login"]').submit()
    cy.get('[data-cy="alerta-login"]').should('have.length',1)


    //Introducir campos
    cy.get('[data-cy="correo"]').type('correo@correo.com')
    cy.get('[data-cy="password"]').type('000')

    //Submit
    cy.get('[data-cy="formulario-login"]').submit()
    cy.get('[data-cy="alerta-login"]').should('have.length',1)

  })

  it('Comprobar sin datos', () => {
    //Submit
    cy.get('[data-cy="formulario-login"]').submit()
    cy.get('[data-cy="alerta-login"]').should('have.length',2)
  })

  it('Comprobar usuario no existe', () => {
    //Introducir campos
    cy.get('[data-cy="correo"]').type('hola@correo.com')
    cy.get('[data-cy="password"]').type('000')

    //Submit
    cy.get('[data-cy="formulario-login"]').submit()
    cy.get('[data-cy="alerta-login"]').should('have.text','\n            El usuario no existe        ')
  })

  it('Comprobar sin password', () => {
    //Introducir campos
    cy.get('[data-cy="correo"]').type('correo@correo.com')

    //Submit
    cy.get('[data-cy="formulario-login"]').submit()
    cy.get('[data-cy="alerta-login"]').should('have.text','\n            Debes introducir una contraseña        ')
  })

  it('Comprobar password erroneo', () => {
    //Introducir campos
    cy.get('[data-cy="correo"]').type('correo@correo.com')
    cy.get('[data-cy="password"]').type('000')

    //Submit
    cy.get('[data-cy="formulario-login"]').submit()
    cy.get('[data-cy="alerta-login"]').should('have.text','\n            Contraseña incorrecta        ')
  })
})