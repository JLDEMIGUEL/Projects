
describe('Comprobar routing', () => {
  it('Navegacion header', () => {
    cy.visit('/')

    cy.get('[data-cy="navegacion-header"]').should('exist')
    cy.get('[data-cy="navegacion-header"]').find('a').should('have.length.greaterThan',4)
    cy.get('[data-cy="navegacion-header"]').find('a').eq(0).invoke('attr','href').should('equal','/nosotros')
    cy.get('[data-cy="navegacion-header"]').find('a').eq(1).invoke('attr','href').should('equal','/propiedades')
    cy.get('[data-cy="navegacion-header"]').find('a').eq(2).invoke('attr','href').should('equal','/blog')
    cy.get('[data-cy="navegacion-header"]').find('a').eq(3).invoke('attr','href').should('equal','/contacto')
  
  })

  it('Navegacion footer', () => {
    cy.visit('/')

    cy.get('[data-cy="navegacion-footer"]').should('exist')
    cy.get('[data-cy="navegacion-footer"]').find('a').should('have.length',4)
    cy.get('[data-cy="navegacion-footer"]').find('a').eq(0).invoke('attr','href').should('equal','/nosotros')
    cy.get('[data-cy="navegacion-footer"]').find('a').eq(1).invoke('attr','href').should('equal','/propiedades')
    cy.get('[data-cy="navegacion-footer"]').find('a').eq(2).invoke('attr','href').should('equal','/blog')
    cy.get('[data-cy="navegacion-footer"]').find('a').eq(3).invoke('attr','href').should('equal','/contacto')
  })
})