describe('Comprobar formulario contacto', () => {
  it('Pagina', () => {
    cy.visit('/contacto')
    cy.get('[data-cy="heading-contacto"]').should('exist')
    cy.get('[data-cy="heading-contacto"]').invoke('text').should('equal','Contacto')
  })
  it('Formulario', () => {
    cy.get('[data-cy="input-nombre"]').type('Jose')
    cy.get('[data-cy="input-mensaje"]').type('Deseo comprar una casa')
    cy.get('[data-cy="input-opciones"]').select('Compra')
    cy.get('[data-cy="input-precio"]').type('1000')

    //Metodo telefono
    cy.get('[data-cy="forma-contacto"]').eq(0).check()
    cy.get('[data-cy="input-telefono"]').type('123456789')
    cy.get('[data-cy="input-fecha"]').type('2022-06-30')
    cy.get('[data-cy="input-hora"]').type('18:30')
    //Metodo correo
    cy.get('[data-cy="forma-contacto"]').eq(1).check()
    cy.get('[data-cy="input-correo"]').type('correo@correo.com')

    cy.get('[data-cy="formulario-contacto"]').submit()
    cy.get('[data-cy="alerta-envio"]').should('exist')
    cy.get('[data-cy="alerta-envio"]').invoke('text').should('equal','Mensaje enviado correctamente')
    cy.get('[data-cy="alerta-envio"]').should('have.class','alerta').and('have.class','exito').and('not.have.class','error')
  })


})