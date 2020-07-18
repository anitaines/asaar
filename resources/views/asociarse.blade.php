@extends("layouts.app")

@section("meta-description")
  "Cómo asociarse"
  @endsection

@section("title")
  Asociarse -
  @endsection

@section('css')
  <link rel="stylesheet" href="/css/stylesResp.css?v={{$cssVersion}}">
@endsection

@section('content')
  <div class="container_contacto container_asociarse">

    <main class="main_contacto">

        <h1 class="h1_aspergerCEA h1_congresos">Asociarse</h1>

        <p class="p_aspergerCEA">Le agradecemos su interés en asociarse a la Asociación Asperger Argentina.</p>
        <p class="p_aspergerCEA">Es importante que Ud. sepa que la AsAAr se financia exclusivamente con las cuotas de sus asociados.</p>
        {{-- <p class="p_aspergerCEA">El valor de la misma es de $ 250.- por mes.</p>
        <p class="p_aspergerCEA">Abajo encontrará las distintas formas de pago de dicha cuota.</p> --}}

        @if (session('success'))
          <div class="alert-success">
            <p class="p_aspergerCEA">{{ session('success') }}</p>
          </div>
        @else
          <h3 class="h3_aspergerCEA">Para asociarse complete el siguiente formulario:</h3>
          <p class="p_aspergerCEA">(Todos los campos son obligatorios)</p>
          <div class="container_form">
              <form class="form_newsletter_footer" action="/asociarse" method="post">
                @csrf

                @if ($errors->all())
                  <div class="form_item">
                    <p class="error-message">Algunos campos presentan errores</p>
                    <p class="error-message">Revisar los campos marcados con ❌</p>
                    </div>
                @endif

                <div class="form_item">
                  <label class="label_newsletter_footer" for="name" style="text-transform: uppercase;">
                    @if ($errors->get('name'))
                      <span class="error-message-cross">❌</span> Nombre
                      @elseif ($errors->all() != null && !$errors->get('name'))
                        <span class="error-message-checked">✓</span> Nombre
                        @else
                        Nombre
                    @endif
                    </label>
                  <input class="input_newsletter_footer" type="text" id="name" name="name" value="{{ old('name') }}">
                  @error('name') <p class="error-message">{{ $message }}</p> @enderror
                  </div>

                <div class="form_item">
                  <label class="label_newsletter_footer" for="surname" style="text-transform: uppercase;">
                    @if ($errors->get('surname'))
                      <span class="error-message-cross">❌</span> Apellido
                    @elseif ($errors->all() != null && !$errors->get('surname'))
                        <span class="error-message-checked">✓</span> Apellido
                        @else
                        Apellido
                    @endif
                    </label>
                  <input class="input_newsletter_footer" type="text" id="surname" name="surname" value="{{ old('surname') }}">
                  @error('surname') <p class="error-message">{{ $message }}</p> @enderror
                  </div>

                <div class="form_item">
                  <label class="label_newsletter_footer"  for="address" style="text-transform: uppercase;">
                    @if ($errors->get('address'))
                      <span class="error-message-cross">❌</span> Domicilio
                    @elseif ($errors->all() != null && !$errors->get('address'))
                        <span class="error-message-checked">✓</span> Domicilio
                        @else
                        Domicilio
                    @endif
                    </label>
                  <input class="input_newsletter_footer" type="text" id="address" name="address" value="{{ old('address') }}">
                  @error('address') <p class="error-message">{{ $message }}</p> @enderror
                  </div>

                <div class="form_item">
                  <label class="label_newsletter_footer"  for="town" style="text-transform: uppercase;">
                    @if ($errors->get('town'))
                      <span class="error-message-cross">❌</span> Localidad
                    @elseif ($errors->all() != null && !$errors->get('town'))
                        <span class="error-message-checked">✓</span> Localidad
                        @else
                        Localidad
                    @endif
                    </label>
                  <input class="input_newsletter_footer" type="text" id="town" name="town" value="{{ old('town') }}">
                  @error('town') <p class="error-message">{{ $message }}</p> @enderror
                  </div>

                <div class="form_item">
                  <label class="label_newsletter_footer"  for="state" style="text-transform: uppercase;">
                    @if ($errors->get('state'))
                      <span class="error-message-cross">❌</span> Provincia/ Estado/ Depto.
                    @elseif ($errors->all() != null && !$errors->get('state'))
                        <span class="error-message-checked">✓</span> Provincia/ Estado/ Depto.
                        @else
                        Provincia/ Estado/ Depto.
                    @endif
                    </label>
                  <input class="input_newsletter_footer" type="text" id="state" name="state" value="{{ old('state') }}">
                  @error('state') <p class="error-message">{{ $message }}</p> @enderror
                  </div>

                <div class="form_item">
                  <label class="label_newsletter_footer customLabel"  for="country" style="text-transform: uppercase;">
                    @if ($errors->get('country'))
                      <span class="error-message-cross">❌</span> País
                    @elseif ($errors->all() != null && !$errors->get('country'))
                        <span class="error-message-checked">✓</span> País
                        @else
                        País
                    @endif
                    </label>
                    <select class="" id="country" name="country">
                      <option value="">Elegir una opción:</option>
                      @for ($i = 0; $i < count($paises); $i++)
                        @if (old('country') && old('country') == $paises[$i]["name"])
                          <option value="{{$paises[$i]["name"]}}" selected>{{$paises[$i]["name"]}}</option>
                          @else
                          <option value="{{$paises[$i]["name"]}}">{{$paises[$i]["name"]}}</option>
                          @endif
                        @endfor
                      </select>
                  @error('country') <p class="error-message">{{ $message }}</p> @enderror
                  </div>

                <div class="form_item">
                  <label class="label_newsletter_footer"  for="cp" style="text-transform: uppercase;">
                    @if ($errors->get('cp'))
                      <span class="error-message-cross">❌</span> Código Postal
                    @elseif ($errors->all() != null && !$errors->get('cp'))
                        <span class="error-message-checked">✓</span> Código Postal
                        @else
                        Código Postal
                    @endif
                    </label>
                  <input class="input_newsletter_footer" type="text" id="cp" name="cp" value="{{ old('cp') }}">
                  @error('cp') <p class="error-message">{{ $message }}</p> @enderror
                  </div>

                <div class="form_item">
                  <label class="label_newsletter_footer"  for="telephone" style="text-transform: uppercase;">
                    @if ($errors->get('telephone'))
                      <span class="error-message-cross">❌</span> Teléfono de contacto
                    @elseif ($errors->all() != null && !$errors->get('telephone'))
                        <span class="error-message-checked">✓</span> Teléfono de contacto
                        @else
                        Teléfono de contacto
                    @endif
                    </label>
                  <input class="input_newsletter_footer" type="text" id="telephone" name="telephone" value="{{ old('telephone') }}">
                  @error('telephone') <p class="error-message">{{ $message }}</p> @enderror
                  </div>

                <div class="form_item">
                  <label class="label_newsletter_footer customLabel"  for="citizenship" style="text-transform: uppercase;">
                    @if ($errors->get('citizenship'))
                      <span class="error-message-cross">❌</span> Nacionalidad
                    @elseif ($errors->all() != null && !$errors->get('citizenship'))
                        <span class="error-message-checked">✓</span> Nacionalidad
                        @else
                        Nacionalidad
                    @endif
                    </label>
                    <select class="" id="citizenship" name="citizenship">
                      <option value="">Elegir una opción:</option>
                      @for ($i = 0; $i < count($paises); $i++)
                        @if (old('citizenship') && old('citizenship') == $paises[$i]["name"])
                          <option value="{{$paises[$i]["name"]}}" selected>{{$paises[$i]["name"]}}</option>
                          @else
                          <option value="{{$paises[$i]["name"]}}">{{$paises[$i]["name"]}}</option>
                          @endif
                        @endfor
                      </select>
                  @error('citizenship') <p class="error-message">{{ $message }}</p> @enderror
                  </div>

                <div class="form_item">
                  <label class="label_newsletter_footer customLabel"  for="maritalStatus" style="text-transform: uppercase;">
                    @if ($errors->get('maritalStatus'))
                      <span class="error-message-cross">❌</span> Estado civil
                    @elseif ($errors->all() != null && !$errors->get('maritalStatus'))
                        <span class="error-message-checked">✓</span> Estado civil
                        @else
                        Estado civil
                    @endif
                    </label>
                    <select class="" id="maritalStatus" name="maritalStatus">
                      <option value="">Elegir una opción:</option>
                      @for ($i = 0; $i < count($estadoCivil); $i++)
                        @if (old('maritalStatus') && old('maritalStatus') == $estadoCivil[$i])
                          <option value="{{$estadoCivil[$i]}}" selected>{{$estadoCivil[$i]}}</option>
                          @else
                          <option value="{{$estadoCivil[$i]}}">{{$estadoCivil[$i]}}</option>
                          @endif
                        @endfor
                    </select>
                  @error('maritalStatus') <p class="error-message">{{ $message }}</p> @enderror
                  </div>

                <div class="form_item">
                  <label class="label_newsletter_footer customLabel"  for="id" style="text-transform: uppercase;">
                    @if ($errors->get('id'))
                      <span class="error-message-cross">❌</span> Documento
                    @elseif ($errors->all() != null && !$errors->get('id'))
                        <span class="error-message-checked">✓</span> Documento
                        @else
                        Documento
                    @endif
                    </label>
                    <select class="" id="id" name="id">
                      <option value="">Elegir una opción:</option>
                      @for ($i = 0; $i < count($documento); $i++)
                        @if (old('id') && old('id') == $documento[$i])
                          <option value="{{$documento[$i]}}" selected>{{$documento[$i]}}</option>
                          @else
                          <option value="{{$documento[$i]}}">{{$documento[$i]}}</option>
                          @endif
                        @endfor
                    </select>
                  @error('id') <p class="error-message">{{ $message }}</p> @enderror
                  </div>

                <div class="form_item">
                  <label class="label_newsletter_footer"  for="number" style="text-transform: uppercase;">
                    @if ($errors->get('number'))
                      <span class="error-message-cross">❌</span> Número
                    @elseif ($errors->all() != null && !$errors->get('number'))
                        <span class="error-message-checked">✓</span> Número
                        @else
                        Número
                    @endif
                    </label>
                  <input class="input_newsletter_footer" type="text" id="number" name="number" value="{{ old('number') }}">
                  @error('number') <p class="error-message">{{ $message }}</p> @enderror
                  </div>

                <div class="form_item">
                  <label class="label_newsletter_footer"  for="profession" style="text-transform: uppercase;">
                    @if ($errors->get('profession'))
                      <span class="error-message-cross">❌</span> Profesión
                    @elseif ($errors->all() != null && !$errors->get('profession'))
                        <span class="error-message-checked">✓</span> Profesión
                        @else
                        Profesión
                    @endif
                    </label>
                  <input class="input_newsletter_footer" type="text" id="profession" name="profession" value="{{ old('profession') }}">
                  @error('profession') <p class="error-message">{{ $message }}</p> @enderror
                  </div>

                <div class="form_item">
                  <label class="label_newsletter_footer"  for="businessAddress" style="text-transform: uppercase;">
                    @if ($errors->get('businessAddress'))
                      <span class="error-message-cross">❌</span> Domicilio laboral
                    @elseif ($errors->all() != null && !$errors->get('businessAddress'))
                        <span class="error-message-checked">✓</span> Domicilio laboral
                        @else
                        Domicilio laboral
                    @endif
                    </label>
                  <input class="input_newsletter_footer" type="text" id="businessAddress" name="businessAddress" value="{{ old('businessAddress') }}">
                  @error('businessAddress') <p class="error-message">{{ $message }}</p> @enderror
                  </div>

                <div class="form_item">
                  <label class="label_newsletter_footer" for="email" style="text-transform: uppercase;">
                    @if ($errors->get('email'))
                      <span class="error-message-cross">❌</span> E-mail
                    @elseif ($errors->all() != null && !$errors->get('email'))
                        <span class="error-message-checked">✓</span> E-mail
                        @else
                        E-mail
                    @endif
                    </label>
                  <input class="input_newsletter_footer" type="text" id="email" name="email" value="{{ old('email') }}">
                  @error('email') <p class="error-message">{{ $message }}</p> @enderror
                </div>

                <div class="form_item estatuto">
                  <a href="/estatuto" target="_blank">Leer estatuto de la Asociación</a>
                </div>

                <div class="form_item form_item_checkbox">
                  <label class="checkbox-label">
                    @if ($errors->get('estatuto'))
                      <span class="error-message-cross">❌</span>
                      <span class="input-title">Declaro conocer el Estatuto de la AsAAr:</span>
                    @elseif ($errors->all() != null && !$errors->get('estatuto'))
                        <span class="error-message-checked">✓</span>
                        <span class="input-title">Declaro conocer el Estatuto de la AsAAr:</span>
                        @else
                        <span class="input-title">Declaro conocer el Estatuto de la AsAAr:</span>
                      @endif
                    @if (old('estatuto') && old('estatuto') == "sí")
                      <input type="checkbox" name="estatuto" value="sí" checked>
                      @else
                      <input type="checkbox" name="estatuto" value="sí">
                      @endif
                    <span class="checkbox-custom">✓</span>
                    </label>
                    @error('estatuto') <p class="error-message">{{ $message }}</p> @enderror
                </div>

                <div class="form_item form_item_checkbox">
                  <label class="checkbox-label">
                    @if ($errors->get('payment'))
                      <span class="error-message-cross">❌</span>
                      <span class="input-title">Acepto el pago de la cuota social de $250.- por mes:</span>
                    @elseif ($errors->all() != null && !$errors->get('payment'))
                        <span class="error-message-checked">✓</span>
                        <span class="input-title">Acepto el pago de la cuota social de $250.- por mes:</span>
                        @else
                        <span class="input-title">Acepto el pago de la cuota social de $250.- por mes:</span>
                      @endif
                    @if (old('payment') && old('payment') == "sí")
                      <input type="checkbox" name="payment" value="sí" checked>
                      @else
                      <input type="checkbox" name="payment" value="sí">
                      @endif
                    <span class="checkbox-custom">✓</span>
                    </label>
                    @error('payment') <p class="error-message">{{ $message }}</p> @enderror
                </div>

                 {{-- <div class="form_item">
                   <label class="label_newsletter_footer customLabel"  for="paymentType">
                     @if ($errors->get('paymentType'))
                       <span class="error-message-cross">❌</span> FORMA DE PAGO
                     @elseif ($errors->all() != null && !$errors->get('paymentType'))
                         <span class="error-message-checked">✓</span> FORMA DE PAGO
                         @else
                         FORMA DE PAGO
                     @endif
                     </label>
                     <select class="" id="paymentType" name="paymentType">
                       <option value="">Elegir una opción:</option>
                       @for ($i = 0; $i < count($formaPago); $i++)
                         @if (old('paymentType') && old('paymentType') == $formaPago[$i])
                           <option value="{{$formaPago[$i]}}" selected>{{$formaPago[$i]}}</option>
                           @else
                           <option value="{{$formaPago[$i]}}">{{$formaPago[$i]}}</option>
                           @endif
                         @endfor
                     </select>
                   @error('paymentType') <p class="error-message">{{ $message }}</p> @enderror
                   </div> --}}

                <p class="p_aspergerCEA">Usted recibirá un mail de administracion@asperger.org.ar informándole las formas de pago disponibles</p>
                {{-- <p class="p_aspergerCEA">1) Depósito o transferencia a la cuenta:</p>
                <p class="p_aspergerCEA">BANCO CREDICOOP</p>
                <p class="p_aspergerCEA">Sucursal 006</p>
                <p class="p_aspergerCEA">Cuenta corriente Nro.Cta.: <b>006-091315/5</b></p>
                <p class="p_aspergerCEA">a nombre de: <b>ASOC CIVIL ASPERGER ARGENTINA</b></p>
                <p class="p_aspergerCEA">CBU <b>19100063 55000609131550</b></p>
                <p class="p_aspergerCEA">CUIT N° <b>30-70909015-8</b></p>
                <p class="p_aspergerCEA">Mandar mail a Estela Ocello - <a href="mailto:administracion@asperger.org.ar" target="_blank" rel="noopener noreferrer"><b>administracion@asperger.org.ar</b></a> quien es la Tesorera, comunicando el depósito.</p>

                <p class="p_aspergerCEA">2) Pago en efectivo (lugares de reunión, Srta. Estela Ocello).</p>

                <p class="p_aspergerCEA">3) Pago Fácil: Para ello deberá enviar un mail a <a href="mailto:administracion@asperger.org.ar" target="_blank" rel="noopener noreferrer"><b>administracion@asperger.org.ar</b></a> solicitando la credencial de pago indicando su nombre y apellido. Dicha credencial le será enviada por mail.</p> --}}

                {{-- {{dd($errors->all())}} --}}
                <button class="buton_newsletter_footer"  type="submit">
                  <p>Enviar formulario</p>
                  <p>Procesando</p>
                </button>
                </form>

              </div>
        @endif
    </main>

    <div class="carousel_colors">
      <div class="green"></div>
      <div class="orange"></div>
      <div class="blue"></div>
    </div>

  </div>

  @endsection
