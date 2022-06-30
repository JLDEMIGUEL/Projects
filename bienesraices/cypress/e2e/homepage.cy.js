describe('Cargar  pagina principal', () => {
  it('Header de pagina principal', () => {
    cy.visit('/')

    cy.get('[data-cy="heading-sitio"]').should('exist')
    cy.get('[data-cy="heading-sitio"]').invoke('text').should('equal','Venta de Casas y Departamentos Exclusivos de Lujo')
    cy.get('[data-cy="heading-sitio"]').invoke('text').should('not.equal','')
  })

  it('Bloque de iconos principales', () => {
    cy.visit('/')

    cy.get('[data-cy="heading-nosotros"]').should('exist')
    cy.get('[data-cy="heading-nosotros"]').should('have.prop','tagName').should('equal','H2')

    //iconos
    cy.get('[data-cy="iconos-nosotros"]').should('exist')
    cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('have.length',3)
  })

  it('Bloque de anuncios', () => {
    cy.visit('/')

    cy.get('[data-cy="heading-anuncios"]').should('exist')
    cy.get('[data-cy="heading-anuncios"]').should('have.prop','tagName').should('equal','H2')

    //Anuncios
    cy.get('[data-cy="contenedor-anuncios"]').should('exist')
    cy.get('[data-cy="contenedor-anuncios"]').find('.anuncio').should('have.length',3)
    //Igual
    cy.get('[data-cy="anuncio"]').should('have.length',3)
    cy.get('[data-cy="enlace-propiedad"]').should('have.class','boton-amarillo')
    cy.get('[data-cy="enlace-propiedad"]').first().invoke('text').should('equal','Ver Propiedad')

    //Probar enlace
    cy.get('[data-cy="enlace-propiedad"]').first().click();
    cy.get('[data-cy="titulo-propiedad"]').should('exist');
    cy.wait(1000);cy.go('back');

    //Enlace ver todas
    cy.get('[data-cy="ver-propiedades"]').should('exist');
    cy.get('[data-cy="ver-propiedades"]').invoke('attr','href').should('equal','propiedades');
    cy.get('[data-cy="ver-propiedades"]').click();
    cy.get('[data-cy="contenedor-anuncios"]').should('exist');
    cy.wait(1000);cy.go('back');
  })

  it('Bloque de contacto', () => {
    cy.visit('/')

    cy.get('[data-cy="imagen-contacto"]').should('exist')
    cy.get('[data-cy="imagen-contacto"]').find('h2').invoke('text').should('equal','Encuentra la casa de tus sueños')
    cy.get('[data-cy="imagen-contacto"]').find('a').invoke('attr','href').then(href=>{
      cy.visit(href)
    })
    cy.get('[data-cy="heading-contacto"]').should('exist')
    cy.wait(1000)
    cy.visit('/')
  })

  it('Bloque de comentarios y blog', () => {
    cy.visit('/')

    //Blog
    cy.get('[data-cy="blog"]').should('exist')
    cy.get('[data-cy="blog"]').find('h3').invoke('text').should('equal','Nuestro Blog')
    cy.get('[data-cy="blog"]').find('img').should('have.length',2)
    
    //Comentarios
    cy.get('[data-cy="comentarios"]').should('exist')
    cy.get('[data-cy="comentarios"]').find('h3').invoke('text').should('equal','Comentarios') 
  })
})