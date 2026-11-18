<?php require __DIR__ . '/layout/header.php'; ?>

  <main>
    <section class="portada">
      <div class="texto-portada">
        <p class="etiqueta">★ Colección de audio premium</p>
        <h1>Siente cada ritmo.<br><span>Vive cada momento.</span></h1>
        <p>Sonido de alta calidad, diseño moderno y comodidad para los verdaderos amantes de la música.</p>
        <a class="boton" href="#productos">Comprar ahora →</a>
        <a class="boton oscuro" href="#categorias">Ver más</a>
      </div>
      <div class="imagen-portada">
        <img src="https://images.unsplash.com/photo-1546435770-a3e426bf472b?auto=format&fit=crop&w=900&q=85"
          alt="Audífonos">
        <div class="descuento">Hasta<br><b>30%</b><br>OFF</div>
      </div>
    </section>

    <section id="productos">
      <div class="titulo-seccion">
        <h2>Productos destacados</h2>
        <a href="#productos">Ver todos →</a>
      </div>
      <div class="productos">
<?php foreach ($productos as $p): ?>
        <article class="tarjeta">
          <span class="etiqueta <?= e($p['clase_etiqueta']) ?>"><?= e($p['etiqueta']) ?></span>
          <img src="<?= e($p['imagen_url']) ?>"
            alt="<?= e($p['alt_imagen']) ?>">
          <p><?= e($p['tipo']) ?></p>
          <h3><?= e($p['nombre']) ?></h3>
          <p class="estrellas"><?= estrellas((int) $p['estrellas']) ?> <small>(<?= (int) $p['resenas'] ?>)</small></p>
          <b>$<?= number_format((float) $p['precio'], 2, '.', ',') ?> USD</b>
          <button onclick="agregarCarrito('<?= e(addslashes($p['nombre'])) ?>')">🛒</button>
        </article>
<?php endforeach; ?>
<?php if (!$productos): ?>
        <p class="sin-datos"><?= e($errorBD ?? 'Todavía no hay productos disponibles.') ?></p>
<?php endif; ?>
      </div>
    </section>

    <section id="categorias">
      <div class="titulo-seccion">
        <h2>Compra por categoría</h2>
        <a href="#categorias">Ver categorías →</a>
      </div>
      <div class="categorias">
<?php foreach ($categorias as $c): ?>
        <div class="categoria <?= e($c['clase_color']) ?>"><span></span>
          <h3><?= e($c['nombre']) ?></h3>
          <p><?= e($c['descripcion']) ?></p><a href="#productos">Comprar →</a>
        </div>
<?php endforeach; ?>
<?php if (!$categorias): ?>
        <p class="sin-datos"><?= e($errorBD ?? 'Todavía no hay categorías disponibles.') ?></p>
<?php endif; ?>
      </div>
    </section>

    <section id="oferta" class="oferta">
      <div>
        <h2>GRAN<br>OFERTA</h2>
      </div>
      <div>
        <h2>¡Oferta por tiempo limitado!</h2>
        <p>Hasta 30% de descuento en productos seleccionados.</p>
      </div>
      <a class="boton rosa-boton" href="#productos">Comprar ahora</a>
    </section>

    <section class="beneficios">
<?php foreach ($beneficios as $b): ?>
      <div> <b><?= e($b['titulo']) ?></b>
        <p><?= e($b['descripcion']) ?></p>
      </div>
<?php endforeach; ?>
<?php if (!$beneficios): ?>
      <p class="sin-datos"><?= e($errorBD ?? 'Todavía no hay beneficios para mostrar.') ?></p>
<?php endif; ?>
    </section>

    <!-- ===== NUEVA SECCIÓN: TESTIMONIOS (carrusel con Swiper) ===== -->
    <section id="testimonios">
      <div class="titulo-seccion">
        <h2>Lo que dicen nuestros clientes</h2>
      </div>
      <img class="banner-testimonios" src="img/ondas-crescendo.png" alt="Barras de ecualizador que crecen de izquierda a derecha">
      <div class="swiper carrusel-testimonios">
        <div class="swiper-wrapper">
<?php foreach ($testimonios as $t): ?>
        <article class="swiper-slide testimonio d-flex flex-column justify-content-between gap-3">
          <p class="valoracion" aria-label="<?= (int) $t['estrellas'] ?> de 5 estrellas"><?= estrellas((int) $t['estrellas']) ?></p>
          <p class="comentario">“<?= e($t['comentario']) ?>”</p>
          <div class="cliente d-flex align-items-center gap-3">
            <span class="avatar" aria-hidden="true"><?= e(iniciales($t['nombre'])) ?></span>
            <div><b><?= e($t['nombre']) ?></b><small><?= e($t['detalle']) ?></small></div>
          </div>
        </article>
<?php endforeach; ?>
<?php if (!$testimonios): ?>
        <p class="sin-datos"><?= e($errorBD ?? 'Todavía no hay testimonios para mostrar.') ?></p>
<?php endif; ?>
        </div>
        <div class="swiper-button-prev" aria-label="Testimonio anterior"></div>
        <div class="swiper-button-next" aria-label="Testimonio siguiente"></div>
        <div class="swiper-pagination"></div>
      </div>
    </section>

    <!-- ===== NUEVA SECCIÓN: CONTACTO (formulario, maquetado con la cuadrícula de Bootstrap) ===== -->
    <section id="contacto">
      <div class="titulo-seccion">
        <h2>Contáctanos</h2>
      </div>
      <div class="row g-3">
        <div class="col-lg-5">
          <div class="contacto-info">
            <h3>¿Tienes dudas sobre un producto?</h3>
            <p>Cuéntanos qué producto te interesa o consulta sobre envíos, pagos y garantía. Te respondemos por correo.</p>
            <ul class="d-flex flex-column gap-3">
              <li><b>Correo</b>contacto@crescendo.com</li>
              <li><b>WhatsApp</b>+57 300 000 0000</li>
              <li><b>Horario de atención</b>Lunes a viernes, 8:00 a. m. a 6:00 p. m.</li>
            </ul>
            <img class="imagen-contacto" src="img/soporte-audifonos.png" alt="Audífonos con ondas de sonido">
          </div>
        </div>

        <div class="col-lg-7">
          <form class="formulario" action="contacto.php" method="post">
            <div class="row g-3">
              <div class="col-md-6">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" autocomplete="name" required>
              </div>
              <div class="col-md-6">
                <label for="telefono">Teléfono (opcional)</label>
                <input type="tel" id="telefono" name="telefono" autocomplete="tel">
              </div>
              <div class="col-12">
                <label for="correo">Correo electrónico</label>
                <input type="email" id="correo" name="correo" autocomplete="email" required>
              </div>
              <div class="col-12">
                <label for="producto">Producto de interés</label>
                <select id="producto" name="producto">
                  <option value="Consulta general">Consulta general</option>
                  <option value="Earbud Y168A">Earbud Y168A</option>
                  <option value="Pro X168A">Pro X168A</option>
                  <option value="Speaker P168A">Speaker P168A</option>
                </select>
              </div>
              <div class="col-12">
                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje" name="mensaje" required></textarea>
              </div>
              <div class="col-12">
                <button type="submit">Enviar mensaje</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </main>

<?php require __DIR__ . '/layout/footer.php'; ?>
