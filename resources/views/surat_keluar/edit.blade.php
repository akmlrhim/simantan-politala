@extends('layouts.main')

@push('css-libs')
  <style>
    .ck-editor__editable ol {
      list-style: decimal;
      margin-left: 1.5rem;
    }

    .ck-editor__editable ul {
      list-style: disc;
      margin-left: 1.5rem;
    }

    .ck-editor__editable {
      white-space: pre-wrap;
      padding: 1rem;
      margin: 0;
      line-height: 1.5;
      font-size: 14px;
    }

    .ck-editor__editable_inline {
      min-height: 240px;
    }
  </style>
@endpush

@section('content')
  <div class="overflow-x-auto shadow-md">
    <div class="min-w-full inline-block align-middle">
      <div class="rounded-lg overflow-visible bg-white p-6 dark:border-neutral-700">
        <form action="{{ route('surat-keluar.update', $suratKeluar->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="grid gap-6">
            <div>
              <label for="nomor_surat" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Nomor Surat
              </label>
              <input type="text" name="nomor_surat" id="nomor_surat"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full md:w-3/4 p-2 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                placeholder="Masukkan nomor surat" value="{{ old('nomor_surat', $suratKeluar->nomor_surat) }}"
                autocomplete="off" />
              @error('nomor_surat')
                <x-validation>{{ ucfirst($message) }}</x-validation>
              @enderror
            </div>

            <div>
              <label for="hal" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Hal
              </label>
              <input type="text" name="hal" id="hal"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full md:w-3/4 p-2 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                placeholder="Masukkan hal" value="{{ old('hal', $suratKeluar->hal) }}" autocomplete="off" />
              @error('hal')
                <x-validation>{{ ucfirst($message) }}</x-validation>
              @enderror
            </div>

            <div>
              <label for="tanggal_surat" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Tanggal Surat
              </label>
              <input type="text" datepicker datepicker-autohide datepicker-format="yyyy-mm-dd" name="tanggal_surat"
                id="tanggal_surat"
                class="block w-full md:w-3/4 p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-600 focus:border-blue-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                placeholder="Pilih tanggal surat"
                value="{{ old('tanggal_surat', \Carbon\Carbon::parse($suratKeluar->tanggal_surat)->format('Y-m-d')) }}"
                autocomplete="off" />

              @error('tanggal_surat')
                <x-validation>{{ ucfirst($message) }}</x-validation>
              @enderror
            </div>

            <div>
              <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white" for="isi_surat">
                Isi Surat
              </label>
              <textarea name="isi_surat" id="isi_surat" placeholder="Masukkan isi surat disini...">{{ old('isi_surat', $suratKeluar->isi_surat) }}</textarea>
              @error('isi_surat')
                <x-validation>{{ ucfirst($message) }}</x-validation>
              @enderror
            </div>

            <div>
              <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Detail Surat (Opsional)
              </label>

              <div id="detail-container" class="space-y-3">
                @php
                  // Ambil data detail lama dari model jika sedang edit
                  $oldDetails =
                      old('details') ??
                      ($suratKeluar->details->count() > 0
                          ? $suratKeluar->details->map(fn($d) => ['key' => $d->key, 'value' => $d->value])->toArray()
                          : [['key' => '', 'value' => '']]);
                @endphp

                @foreach ($oldDetails as $i => $detail)
                  <div class="flex flex-col gap-1 detail-row">
                    <div class="flex gap-2">
                      <div class="w-1/3">
                        <input type="text" name="details[{{ $i }}][key]"
                          value="{{ old('details.' . $i . '.key', $detail['key']) }}"
                          placeholder="Nama detail (mis: tempat)"
                          class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                          autocomplete="off">
                        @error('details.' . $i . '.key')
                          <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                      </div>

                      <div class="w-2/3">
                        <input type="text" name="details[{{ $i }}][value]"
                          value="{{ old('details.' . $i . '.value', $detail['value']) }}"
                          placeholder="Isi detail (mis: Jakarta)"
                          class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-full p-2 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                          autocomplete="off">
                        @error('details.' . $i . '.value')
                          <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                      </div>

                      <button type="button" class="remove-detail text-red-600 hover:text-red-800 text-lg font-bold px-2"
                        title="Hapus detail">&times;</button>
                    </div>
                  </div>
                @endforeach
              </div>

              <button type="button" id="add-detail"
                class="mt-2 text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-xs px-3 py-1.5">
                + Tambah Detail
              </button>
            </div>


            <div class="flex gap-3">
              <a href="{{ route('surat-keluar.index') }}"
                class="text-black bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2">
                Kembali
              </a>
              <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700">
                Simpan Data
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    @push('scripts')
      <script src="{{ asset('editor.js') }}"></script>

      <script>
        ClassicEditor
          .create(document.querySelector('#isi_surat'), {
            toolbar: [
              'heading', '|',
              'bold', 'italic', 'link', '|',
              'bulletedList', 'numberedList', '|',
              'outdent', 'indent', '|',
              'insertTable', '|',
              'undo', 'redo'
            ],
          })
          .then(editor => {
            editor.editing.view.document.on('keydown', (evt, data) => {
              if (data.keyCode === 9) {
                data.preventDefault();

                if (data.domEvent.shiftKey) {
                  editor.execute('outdent');
                } else {
                  editor.execute('indent');
                }

                editor.editing.view.focus();
              }
            });
          })
          .catch(error => {
            console.error(error);
          });

        document.addEventListener('DOMContentLoaded', function() {
          const container = document.getElementById('detail-container');
          const addButton = document.getElementById('add-detail');

          // Tambah detail baru
          addButton.addEventListener('click', function() {
            const index = container.querySelectorAll('.detail-row').length;

            const wrapper = document.createElement('div');
            wrapper.classList.add('flex', 'flex-col', 'gap-1', 'detail-row');
            wrapper.innerHTML = `
        <div class="flex gap-2 items-start">
          <input type="text" name="details[${index}][key]" placeholder="Nama detail (mis: tempat)" autocomplete="off"
            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-1/3 p-2 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
          <input type="text" name="details[${index}][value]" placeholder="Isi detail (mis: Auditorium)" autocomplete="off"
            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg w-2/3 p-2 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
          <button type="button"
            class="remove-detail text-red-600 hover:text-red-800 text-lg font-bold px-2"
            title="Hapus detail">&times;</button>
        </div>
      `;
            container.appendChild(wrapper);
          });

          container.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-detail')) {
              e.target.closest('.detail-row').remove();
            }
          });
        });
      </script>
    @endpush
  @endsection
