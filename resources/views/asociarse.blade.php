@extends("layouts.app")

@section("title")
  Asociarse -
  @endsection

@section('content')
  <div class="container_contacto container_asociarse">

    <main class="main_contacto">

        <h1 class="h1_aspergerCEA h1_congresos">Asociarse</h1>

        <p class="p_aspergerCEA">Le agradecemos su interés en asociarse a la Asociación Asperger Argentina.</p>
        <p class="p_aspergerCEA">Es importante que Ud. sepa que la AsAAr se financia exclusivamente con las cuotas de sus asociados.</p>
        <p class="p_aspergerCEA">El valor de la misma es de $ 250.- por mes.</p>
        <p class="p_aspergerCEA">Abajo encontrará las distintas formas de pago de dicha cuota.</p>

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
                  <label class="label_newsletter_footer" for="name">
                    @if ($errors->get('name'))
                      <span class="error-message-cross">❌</span> NOMBRE
                      @elseif ($errors->all() != null && !$errors->get('name'))
                        <span class="error-message-checked">✓</span> NOMBRE
                        @else
                        NOMBRE
                    @endif
                    </label>
                  <input class="input_newsletter_footer" type="text" id="name" name="name" value="{{ old('name') }}">
                  @error('name') <p class="error-message">{{ $message }}</p> @enderror
                  </div>

                <div class="form_item">
                  <label class="label_newsletter_footer" for="surname">
                    @if ($errors->get('surname'))
                      <span class="error-message-cross">❌</span> APELLIDO
                    @elseif ($errors->all() != null && !$errors->get('surname'))
                        <span class="error-message-checked">✓</span> APELLIDO
                        @else
                        APELLIDO
                    @endif
                    </label>
                  <input class="input_newsletter_footer" type="text" id="surname" name="surname" value="{{ old('surname') }}">
                  @error('surname') <p class="error-message">{{ $message }}</p> @enderror
                  </div>

                <div class="form_item">
                  <label class="label_newsletter_footer"  for="address">
                    @if ($errors->get('address'))
                      <span class="error-message-cross">❌</span> DOMICILIO
                    @elseif ($errors->all() != null && !$errors->get('address'))
                        <span class="error-message-checked">✓</span> DOMICILIO
                        @else
                        DOMICILIO
                    @endif
                    </label>
                  <input class="input_newsletter_footer" type="text" id="address" name="address" value="{{ old('address') }}">
                  @error('address') <p class="error-message">{{ $message }}</p> @enderror
                  </div>

                <div class="form_item">
                  <label class="label_newsletter_footer"  for="town">
                    @if ($errors->get('town'))
                      <span class="error-message-cross">❌</span> LOCALIDAD
                    @elseif ($errors->all() != null && !$errors->get('town'))
                        <span class="error-message-checked">✓</span> LOCALIDAD
                        @else
                        LOCALIDAD
                    @endif
                    </label>
                  <input class="input_newsletter_footer" type="text" id="town" name="town" value="{{ old('town') }}">
                  @error('town') <p class="error-message">{{ $message }}</p> @enderror
                  </div>

                <div class="form_item">
                  <label class="label_newsletter_footer"  for="state">
                    @if ($errors->get('state'))
                      <span class="error-message-cross">❌</span> PROVINCIA/ ESTADO/ DEPTO.
                    @elseif ($errors->all() != null && !$errors->get('state'))
                        <span class="error-message-checked">✓</span> PROVINCIA/ ESTADO/ DEPTO.
                        @else
                        PROVINCIA/ ESTADO/ DEPTO.
                    @endif
                    </label>
                  <input class="input_newsletter_footer" type="text" id="state" name="state" value="{{ old('state') }}">
                  @error('state') <p class="error-message">{{ $message }}</p> @enderror
                  </div>

                <div class="form_item">
                  <label class="label_newsletter_footer customLabel"  for="country">
                    @if ($errors->get('country'))
                      <span class="error-message-cross">❌</span> PAÍS
                    @elseif ($errors->all() != null && !$errors->get('country'))
                        <span class="error-message-checked">✓</span> PAÍS
                        @else
                        PAÍS
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
                  <label class="label_newsletter_footer"  for="cp">
                    @if ($errors->get('cp'))
                      <span class="error-message-cross">❌</span> CÓDIGO POSTAL
                    @elseif ($errors->all() != null && !$errors->get('cp'))
                        <span class="error-message-checked">✓</span> CÓDIGO POSTAL
                        @else
                        CÓDIGO POSTAL
                    @endif
                    </label>
                  <input class="input_newsletter_footer" type="text" id="cp" name="cp" value="{{ old('cp') }}">
                  @error('cp') <p class="error-message">{{ $message }}</p> @enderror
                  </div>

                <div class="form_item">
                  <label class="label_newsletter_footer"  for="telephone">
                    @if ($errors->get('telephone'))
                      <span class="error-message-cross">❌</span> TELÉFONO DE CONTACTO
                    @elseif ($errors->all() != null && !$errors->get('telephone'))
                        <span class="error-message-checked">✓</span> TELÉFONO DE CONTACTO
                        @else
                        TELÉFONO DE CONTACTO
                    @endif
                    </label>
                  <input class="input_newsletter_footer" type="text" id="telephone" name="telephone" value="{{ old('telephone') }}">
                  @error('telephone') <p class="error-message">{{ $message }}</p> @enderror
                  </div>

                <div class="form_item">
                  <label class="label_newsletter_footer customLabel"  for="citizenship">
                    @if ($errors->get('citizenship'))
                      <span class="error-message-cross">❌</span> NACIONALIDAD
                    @elseif ($errors->all() != null && !$errors->get('citizenship'))
                        <span class="error-message-checked">✓</span> NACIONALIDAD
                        @else
                        NACIONALIDAD
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
                  <label class="label_newsletter_footer customLabel"  for="maritalStatus">
                    @if ($errors->get('maritalStatus'))
                      <span class="error-message-cross">❌</span> ESTADO CIVIL
                    @elseif ($errors->all() != null && !$errors->get('maritalStatus'))
                        <span class="error-message-checked">✓</span> ESTADO CIVIL
                        @else
                        ESTADO CIVIL
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
                  <label class="label_newsletter_footer customLabel"  for="id">
                    @if ($errors->get('id'))
                      <span class="error-message-cross">❌</span> DOCUMENTO
                    @elseif ($errors->all() != null && !$errors->get('id'))
                        <span class="error-message-checked">✓</span> DOCUMENTO
                        @else
                        DOCUMENTO
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
                  <label class="label_newsletter_footer"  for="number">
                    @if ($errors->get('number'))
                      <span class="error-message-cross">❌</span> NÚMERO
                    @elseif ($errors->all() != null && !$errors->get('number'))
                        <span class="error-message-checked">✓</span> NÚMERO
                        @else
                        NÚMERO
                    @endif
                    </label>
                  <input class="input_newsletter_footer" type="text" id="number" name="number" value="{{ old('number') }}">
                  @error('number') <p class="error-message">{{ $message }}</p> @enderror
                  </div>

                <div class="form_item">
                  <label class="label_newsletter_footer"  for="profession">
                    @if ($errors->get('profession'))
                      <span class="error-message-cross">❌</span> PROFESIÓN
                    @elseif ($errors->all() != null && !$errors->get('profession'))
                        <span class="error-message-checked">✓</span> PROFESIÓN
                        @else
                        PROFESIÓN
                    @endif
                    </label>
                  <input class="input_newsletter_footer" type="text" id="profession" name="profession" value="{{ old('profession') }}">
                  @error('profession') <p class="error-message">{{ $message }}</p> @enderror
                  </div>

                <div class="form_item">
                  <label class="label_newsletter_footer"  for="businessAddress">
                    @if ($errors->get('businessAddress'))
                      <span class="error-message-cross">❌</span> DOMICILIO LABORAL
                    @elseif ($errors->all() != null && !$errors->get('businessAddress'))
                        <span class="error-message-checked">✓</span> DOMICILIO LABORAL
                        @else
                        DOMICILIO LABORAL
                    @endif
                    </label>
                  <input class="input_newsletter_footer" type="text" id="businessAddress" name="businessAddress" value="{{ old('businessAddress') }}">
                  @error('businessAddress') <p class="error-message">{{ $message }}</p> @enderror
                  </div>

                <div class="form_item">
                  <label class="label_newsletter_footer" for="email">
                    @if ($errors->get('email'))
                      <span class="error-message-cross">❌</span> E-MAIL
                    @elseif ($errors->all() != null && !$errors->get('email'))
                        <span class="error-message-checked">✓</span> E-MAIL
                        @else
                        E-MAIL
                    @endif
                    </label>
                  <input class="input_newsletter_footer" type="text" id="email" name="email" value="{{ old('email') }}">
                  @error('email') <p class="error-message">{{ $message }}</p> @enderror
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
                      <span class="input-title">Acepto el pago de la cuota social:</span>
                    @elseif ($errors->all() != null && !$errors->get('payment'))
                        <span class="error-message-checked">✓</span>
                        <span class="input-title">Acepto el pago de la cuota social:</span>
                        @else
                        <span class="input-title">Acepto el pago de la cuota social:</span>
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
                  <label class="label_newsletter_footer" for="estatuto">
                    @if ($errors->get('estatuto'))
                      <span class="error-message-cross">❌</span> Declaro conocer el Estatuto de la AsAAr
                    @elseif ($errors->all() != null && !$errors->get('estatuto'))
                        <span class="error-message-checked">✓</span> Declaro conocer el Estatuto de la AsAAr
                        @else
                        Declaro conocer el Estatuto de la AsAAr
                    @endif
                    </label>
                  @if (old('estatuto') && old('estatuto') == "sí")
                    <input class="input_newsletter_footer" type="checkbox" id="estatuto" name="estatuto" value="sí" checked>
                  @else
                    <input class="input_newsletter_footer" type="checkbox" id="estatuto" name="estatuto" value="sí">
                  @endif
                  @error('estatuto') <p class="error-message">{{ $message }}</p> @enderror
							    </div> --}}

                {{-- <div class="form_item">
                  <label class="label_newsletter_footer" for="payment">
                    @if ($errors->get('payment'))
                      <span class="error-message-cross">❌</span> Acepto el pago de la cuota social
                    @elseif ($errors->all() != null && !$errors->get('payment'))
                        <span class="error-message-checked">✓</span> Acepto el pago de la cuota social
                        @else
                        Acepto el pago de la cuota social
                    @endif
                    </label>
                  @if (old('payment') && old('payment') == "sí")
                    <input class="input_newsletter_footer" type="checkbox" id="payment" name="payment" value="sí" checked>
                    @else
                    <input class="input_newsletter_footer" type="checkbox" id="payment" name="payment" value="sí">
                    @endif
                  @error('payment') <p class="error-message">{{ $message }}</p> @enderror
							    </div> --}}

                 <div class="form_item">
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
                   </div>


                <p class="p_aspergerCEA">1) Depósito o transferencia a la cuenta:<br>
                      BANCO CREDICOOP<br>
                      Sucursal 006<br>
                      Cuenta corriente Nro.Cta.: <b>006-091315/5</b><br>
                      a nombre de : <b>ASOC CIVIL ASPERGER ARGENTINA</b><br>
                      CBU <b>19100063 55000609131550</b><br>
                      CUIT N° <b>30-70909015-8</b><br>
                      Mandar mail a Estela Ocello - <a href="mailto:administracion@asperger.org.ar" target="_blank" rel="noopener noreferrer"><b>administracion@asperger.org.ar</b></a> quien es la Tesorera, comunicando el depósito.</p>
                <p class="p_aspergerCEA">2) Pago en efectivo (lugares de reunión, Srta. Estela Ocello)</p>
                <p class="p_aspergerCEA">3) Pago Fácil: Para ello deberá enviar un mail a <a href="mailto:administracion@asperger.org.ar" target="_blank" rel="noopener noreferrer"><b>administracion@asperger.org.ar</b></a><br>
                      solicitando la credencial de pago indicando su nombre y apellido. Dicha credencial le será enviada por mail.</p>

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
