<section class="px-12 mx-auto max-w-7xl">
  <header class="flex items-center">
    <h1 class="text-lg font-bold md:text-2xl">
      <span class="text-gray-500">Orders //</span> #{{ $order->id }}
    </h1>
  </header>

  <div class="grid grid-cols-1 gap-8 mt-8 lg:items-start lg:grid-cols-3">
    <div class="lg:col-span-2">
      <div class="flex items-center text-xs text-gray-700">
        <button
          class="inline-flex items-center px-4 py-2 font-bold transition border border-transparent rounded hover:bg-gray-50 hover:border-gray-200"
          type="button"
        >
          <x-hub::icon
            ref="printer"
            style="solid"
            class="w-4 mr-2"
          />

          Print
        </button>

        <button
          class="inline-flex items-center px-4 py-2 font-bold transition border border-transparent rounded hover:bg-gray-50 hover:border-gray-200"
          type="button"
        >
          <x-hub::icon
            ref="rewind"
            style="solid"
            class="w-4 mr-2"
          />

          Refund
        </button>

        <button
          class="inline-flex items-center px-4 py-2 font-bold transition border border-transparent rounded hover:bg-gray-50 hover:border-gray-200"
          type="button"
        >
          <x-hub::icon
            ref="flag"
            style="solid"
            class="w-4 mr-2"
          />

          Update Status
        </button>

        <div
          class="relative flex justify-end flex-1"
          x-data="{ showMenu: false }"
        >
          <button
            class="inline-flex items-center px-4 py-2 font-bold transition border rounded hover:bg-white bg-gray-50"
            type="button"
            x-on:click="showMenu = !showMenu"
          >
            More Actions

            <x-hub::icon
              ref="chevron-down"
              style="solid"
              class="w-4 ml-2"
            />
          </button>

          <div
            class="absolute right-0 z-50 w-screen max-w-[200px] mt-2 text-sm bg-white border rounded-lg shadow-lg top-full"
            role="menu"
            x-on:click.away="showMenu = false"
            x-show="showMenu"
            x-transition
            x-cloak
          >
            <div
              class="py-1"
              role="none"
            >
              <button
                class="flex items-center w-full px-4 py-2 text-left transition hover:bg-gray-50"
                role="menuitem"
                type="button"
              >
                <x-hub::icon
                  ref="credit-card"
                  style="solid"
                  class="w-4 mr-2"
                />

                Add Payment
              </button>

              <button
                class="flex items-center w-full px-4 py-2 text-left transition hover:bg-gray-50"
                role="menuitem"
                type="button"
              >
                <x-hub::icon
                  ref="flag"
                  style="solid"
                  class="w-4 mr-2"
                />

                Update Status
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="p-6 mt-4 space-y-4 bg-white rounded-lg shadow">
        <div class="flow-root">
          <ul class="-my-4 divide-y divide-gray-200">
            @foreach ($this->visibleLines as $line)
              <li
                class="py-4"
                x-data="{ showDetails: false }"
              >
                <div class="flex items-start">
                  <div class="flex gap-2">
                    <input
                      class="w-5 h-5 text-blue-500 border-gray-200 rounded cursor-pointer form-checkbox"
                      aria-label="{{ $line->id }}"
                      type="checkbox"
                    >

                    <div class="flex-shrink-0 p-1 overflow-hidden border border-gray-200 rounded">
                      <img
                        class="object-contain w-12 h-12"
                        src="{{ $line->purchasable->getThumbnail() }}"
                      />
                    </div>
                  </div>

                  <div class="flex-1">
                    <div class="gap-8 xl:justify-between xl:items-start xl:flex">
                      <div
                        class="relative flex items-center justify-between gap-4 pl-8 xl:justify-end xl:pl-0 xl:order-last"
                        x-data="{ showMenu: false }"
                      >
                        <p class="text-sm">
                          {{ $line->quantity }} @ {{ $line->unit_price->formatted }}

                          <span class="ml-1">
                            {{ $line->sub_total->formatted }}
                          </span>
                        </p>

                        <button
                          class="text-gray-400 hover:text-gray-800"
                          x-on:click="showMenu = !showMenu"
                          type="button"
                        >
                          <x-hub::icon
                            ref="dots-vertical"
                            style="solid"
                          />
                        </button>

                        <div
                          class="absolute right-0 z-50 mt-2 text-sm bg-white border rounded-lg shadow-lg top-full"
                          role="menu"
                          x-on:click.away="showMenu = false"
                          x-show="showMenu"
                          x-transition
                          x-cloak
                        >
                          <div
                            class="py-1"
                            role="none"
                          >
                            <button
                              class="w-full px-4 py-2 text-left transition hover:bg-gray-50"
                              role="menuitem"
                              type="button"
                            >
                              Refund Line
                            </button>

                            <button
                              class="w-full px-4 py-2 text-left transition hover:bg-gray-50"
                              role="menuitem"
                              type="button"
                            >
                              Refund Stock
                            </button>
                          </div>
                        </div>
                      </div>

                      <button
                        class="flex mt-2 group xl:mt-0"
                        x-on:click="showDetails = !showDetails"
                        type="button"
                      >
                        <x-hub::icon
                          ref="chevron-right"
                          style="solid"
                          class="w-6 mx-1 text-gray-400 transition -mt-7 group-hover:text-gray-600 xl:mt-0"
                        />

                        <div class="max-w-sm space-y-2 text-left">
                          <p class="font-bold leading-tight">
                            {{ $line->description }}
                          </p>

                          <p class="text-xs text-gray-700">
                            KB123450ASDB
                          </p>

                          <div class="flex text-xs text-gray-700">
                            <p>CONV-70-1</p>

                            <dl class="flex text-xs before:content-['|'] before:mx-3 before:text-gray-200">
                              <div class="flex gap-0.5">
                                <dt>Size:</dt>
                                <dd>UK 5</dd>
                              </div>

                              <div class="flex gap-0.5 before:content-['/'] before:mx-1.5 before:text-gray-200">
                                <dt>Color:</dt>
                                <dd>Black</dd>
                              </div>
                            </dl>
                          </div>
                        </div>
                      </button>
                    </div>

                    <article class="pl-8 mt-2">
                      <p class="text-sm text-gray-700">
                        <strong>Notes:</strong>

                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, amet perferendis
                        distinctio quos harum atque error odio.
                      </p>
                    </article>
                  </div>
                </div>

                <div
                  class="pl-[calc(8rem_-_10px)]"
                  x-show="showDetails"
                >
                  <dl class="flex flex-wrap gap-2 pt-4 mt-4 text-xs text-gray-700 border-t">
                    @for ($i = 0; $i < 8; $i++)
                      <div class="flex gap-0.5">
                        <dt>Unit Price:</dt>
                        <dd>$150.00</dd>
                      </div>
                    @endfor
                  </dl>
                </div>
              </li>
            @endforeach
          </ul>
        </div>

        @if ($this->physicalLines->count() > $maxLines)
          <div class="flex justify-end">
            <button
              class="flex-shrink-0 px-5 py-3 text-xs font-bold text-gray-700 bg-gray-100 border border-gray-100 rounded hover:bg-gray-50"
              wire:click="$set('allLinesVisible', {{ !$allLinesVisible }})"
              type="button"
            >
              @if (!$allLinesVisible)
                Show Remaining Lines
              @else
                Collapse Lines
              @endif
            </button>
          </div>
        @endif

        <ul class="space-y-4 text-sm">
          @foreach ($this->shippingLines as $shippingLine)
            <li class="flex items-center justify-between px-4 py-2 border border-gray-200 rounded-lg">
              <div class="flex items-center">
                <x-hub::icon
                  ref="truck"
                  class="mr-2"
                />

                {!! $shippingLine->description !!}
              </div>

              {{ $shippingLine->sub_total->formatted }}
            </li>
          @endforeach
        </ul>

        <div class="grid grid-cols-3 gap-4 p-4 border border-gray-200 rounded-lg bg-gray-50">
          <div class="col-span-2">
            <article class="text-sm">
              <strong>Notes:</strong>

              <p class="mt-4 {{ !$order->notes ? 'text-gray-500' : '' }}">
                @if ($order->notes)
                  {{ $order->notes }}
                @else
                  No notes on this order
                @endif
              </p>
            </article>
          </div>

          <div>
            <dl class="space-y-2 text-xs text-right">
              <div class="flex justify-between">
                <dt>Sub Total</dt>
                <dd>{{ $order->sub_total->formatted }}</dd>
              </div>

              <div class="flex justify-between">
                <dt>Shipping Total</dt>
                <dd>{{ $order->shipping_total->formatted }}</dd>
              </div>

              @foreach ($order->tax_breakdown as $tax)
                <div class="flex justify-between">
                  <dt>{{ $tax->description }}</dt>
                  <dd>{{ $tax->total->formatted }}</dd>
                </div>
              @endforeach

              <div class="flex justify-between text-sm font-bold">
                <dt>Total</dt>
                <dd>{{ $order->total->formatted }}</dd>
              </div>
            </dl>
          </div>
        </div>
      </div>

      <div class="mt-4">
        <header class="sr-only">
          Transactions
        </header>

        <ul class="space-y-4">
          @foreach ($order->transactions as $transaction)
            <li class="flex items-center justify-between p-4 bg-white border border-gray-200 rounded-lg">
              <div class="flex items-center gap-6">
                <strong
                  class="px-4 py-2 text-xs font-bold text-green-700 bg-green-100 border border-current rounded-lg">
                  {{ $transaction->status }}
                </strong>

                <div>
                  <img
                    class="object-contain w-12 h-auto"
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/1599px-Visa_Inc._logo.svg.png?20170118154621"
                    alt="{{ $transaction->card_type }}"
                  >
                </div>

                <div class="flex items-center gap-2">
                  <span class="block">&ast;&ast;&ast;&ast;</span>
                  <span class="block">&ast;&ast;&ast;&ast;</span>
                  <span class="block">&ast;&ast;&ast;&ast;</span>
                  <span class="block">{{ $transaction->last_four }}</span>
                </div>
              </div>

              <div class="font-bold">
                {{ $transaction->amount->formatted }}
              </div>
            </li>
          @endforeach
        </ul>
      </div>

      <div class="mt-4">
        <header class="sr-only">
          Timeline
        </header>

        <div class="flex items-center">
          <div class="flex-shrink-0">
            @livewire('hub.components.avatar')
          </div>

          <form class="relative w-full ml-4">
            <input
              class="w-full pl-4 pr-32 border border-gray-200 rounded-lg h-[58px] sm:text-sm form-text"
              type="text"
              placeholder="Add a comment"
            >

            <button
              class="absolute h-[42px] text-xs font-bold leading-[42px] text-gray-700 bg-gray-100 border border-transparent rounded-md hover:border-gray-100 hover:bg-gray-50 w-28 top-2 right-2"
              type="submit"
            >
              Add Comment
            </button>
          </form>
        </div>

        <div class="relative pt-8">
          <span class="absolute inset-y-0 left-5 w-[2px] bg-gray-200"></span>

          <div class="flow-root">
            <ul
              class="-my-8 divide-y-2 divide-gray-200"
              role="list"
            >
              @for ($i = 0; $i < 3; $i++)
                <li class="relative py-8 ml-5">
                  <p class="ml-8 font-bold">
                    October 4th, 2021
                  </p>

                  <ul class="mt-4 space-y-6">
                    <li class="relative pl-8">
                      <span
                        class="absolute w-4 h-4 bg-gray-300 rounded-full top-1 -left-[calc(0.5rem_-_1px)] ring-4 ring-gray-200"
                      >
                      </span>

                      <div class="flex justify-between">
                        <p class="text-sm">
                          Order confirmation email was sent to Alec Ritson (alec@neondigital.co.uk)
                        </p>

                        <time class="flex-shrink-0 ml-4 text-xs mt-0.5 text-gray-500">12:40pm GMT</time>
                      </div>

                      <div class="flex gap-4 mt-2">
                        <button
                          class="flex-shrink-0 px-4 py-2 text-xs font-bold text-gray-700 border rounded bg-gray-50 hover:bg-white"
                          type="button"
                        >
                          Resend Email
                        </button>

                        <button
                          class="flex-shrink-0 px-4 py-2 text-xs font-bold text-gray-700 border rounded bg-gray-50 hover:bg-white"
                          type="button"
                        >
                          View Email
                        </button>
                      </div>
                    </li>

                    <li class="relative pl-8">
                      <span
                        class="absolute w-4 h-4 bg-green-600 rounded-full top-1 -left-[calc(0.5rem_-_1px)] ring-4 ring-gray-200"
                      >
                      </span>

                      <div class="flex justify-between">
                        <p class="text-sm">A payment of $186.00 was made.</p>

                        <time class="flex-shrink-0 ml-4 text-xs mt-0.5 text-gray-500">12:37pm GMT</time>
                      </div>
                    </li>

                    <li class="relative pl-8">
                      <span
                        class="absolute w-4 h-4 bg-blue-600 rounded-full top-1 -left-[calc(0.5rem_-_1px)] ring-4 ring-gray-200"
                      >
                      </span>

                      <div class="flex justify-between">
                        <p class="text-sm">Order was created and marked pending.</p>

                        <time class="flex-shrink-0 ml-4 text-xs mt-0.5 text-gray-500">12:30pm GMT</time>
                      </div>
                    </li>
                  </ul>
                </li>
              @endfor
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="space-y-4 md:sticky md:top-4">
      <header class="flex items-center justify-between">
        <p class="font-bold truncate">
          Alec Ritson
        </p>

        <button
          class="flex-shrink-0 px-4 py-2 ml-4 text-xs font-bold text-gray-700 border rounded bg-gray-50 hover:bg-white"
          type="button"
        >
          View User
        </button>
      </header>

      <strong
        class="block p-4 text-xs font-bold text-center text-green-700 border rounded-lg shadow-sm border-green-900/25 bg-green-50"
      >
        Payment Received
      </strong>

      <section class="p-4 bg-white rounded-lg shadow">
        <dl class="space-y-2 text-sm">
          <div class="grid grid-cols-2 gap-2">
            <dt class="font-bold">
              Status:
            </dt>

            <dd class="text-right">
              {{ Str::headline($order->status) }}
            </dd>
          </div>

          <div class="grid grid-cols-2 gap-2">
            <dt class="font-bold">
              Reference:
            </dt>

            <dd class="text-right">
              {{ $order->reference }}
            </dd>
          </div>

          <div class="grid grid-cols-2 gap-2">
            <dt class="font-bold">
              Customer Reference:
            </dt>

            <dd class="text-right">
              {{ $order->customer_reference ?: '-' }}
            </dd>
          </div>

          <div class="grid grid-cols-2 gap-2">
            <dt class="font-bold">
              Channel:
            </dt>

            <dd class="text-right">
              {{ $this->channel }}
            </dd>
          </div>

          <div class="grid grid-cols-2 gap-2">
            <dt class="font-bold">
              Date:
            </dt>

            <dd class="text-right">
              @if ($order->placed_at)
                {{ $order->placed_at->format('jS M Y') }}
              @else
                {{ $order->created_at->format('jS M Y') }}
              @endif
            </dd>
          </div>

          <div class="grid grid-cols-2 gap-2">
            <dt class="font-bold">
              Time:
            </dt>

            <dd class="text-right">
              @if ($order->placed_at)
                {{ $order->placed_at->format('H:ma') }}
              @else
                {{ $order->created_at->format('H:ma') }}
              @endif
            </dd>
          </div>
        </dl>
      </section>

      <section class="p-4 bg-white rounded-lg shadow">
        <header class="flex items-center justify-between">
          <p class="font-bold">
            Shipping Address
          </p>

          <button
            class="px-4 py-2 text-xs font-bold text-gray-700 bg-gray-100 border border-transparent rounded hover:border-gray-100 hover:bg-gray-50"
            type="button"
          >
            Edit
          </button>
        </header>

        <address class="mt-4 text-sm not-italic">
          {{ $this->shipping->fullName }} <br>
          {{ $this->shipping->line_one }} <br>

          @if ($this->shipping->line_two)
            {{ $this->shipping->line_two }} <br>
          @endif

          @if ($this->shipping->line_three)
            {{ $this->shipping->line_three }} <br>
          @endif

          @if ($this->shipping->city)
            {{ $this->shipping->city }} <br>
          @endif

          @if ($this->shipping->state)
            {{ $this->shipping->state }} <br>
          @endif

          {{ $this->shipping->postcode }}
        </address>
      </section>

      <section class="p-4 bg-white rounded-lg shadow">
        <header>
          <p class="font-bold">
            Billing Address
          </p>
        </header>

        <p class="mt-4 text-sm {{ !$this->shippingEqualsBilling ? 'text-gray-500' : '' }}">
          @if ($this->shippingEqualsBilling)
            <address class="not-italic">
              {{ $this->billing->fullName }} <br>
              {{ $this->billing->line_one }} <br>

              @if ($this->billing->line_two)
                {{ $this->billing->line_two }} <br>
              @endif

              @if ($this->billing->line_three)
                {{ $this->billing->line_three }} <br>
              @endif

              @if ($this->billing->city)
                {{ $this->billing->city }} <br>
              @endif

              @if ($this->billing->state)
                {{ $this->billing->state }} <br>
              @endif

              {{ $this->billing->postcode }}
            </address>
          @else
            Same as shipping address
          @endif
        </p>
      </section>

      <section class="p-4 bg-white rounded-lg shadow">
        <header>
          <p class="font-bold">
            Additional Details
          </p>
        </header>

        <dl class="mt-4 space-y-2 text-sm">
          <div class="grid grid-cols-3 gap-2">
            <dt class="font-bold">Metafield:</dt>

            <dd class="col-span-2">Lorem ipsum dolor sit amet.</dd>
          </div>

          <div class="grid grid-cols-3 gap-2">
            <dt class="font-bold">Metafield 2:</dt>

            <dd class="col-span-2">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</dd>
          </div>
        </dl>
      </section>
    </div>

    {{-- <x-hub::slideover title="Update Status" wire:model="updatingStatus">
    <x-hub::input.select wire:model="order.status">
      @foreach ($this->statuses as $value => $label)
        <option value="{{ $value }}">{{ $label }}</option>
      @endforeach
    </x-hub::input.select>

    <x-slot name="footer">
      <x-hub::button type="button" wire:click.prevent="$set('updatingStatus', false)" theme="gray">{{ __('adminhub::global.cancel') }}</x-hub::button>
      <x-hub::button type="button" wire:click="saveStatus">Save</x-hub::button>
    </x-slot>
  </x-hub::modal.dialog> --}}

    {{-- <div>
      <x-hub::button type="button" wire:click="$set('updatingStatus', true)">Update Status</x-hub::button>
    </div> --}}

    {{-- <header>
          <h3>Order Lines ({{ $this->physicalLines->count() }})</h3>
        </header> --}}
    {{-- <x-hub::input.checkbox /> --}}
</section>
