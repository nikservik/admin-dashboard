<?php

namespace Nikservik\AdminDashboard\Modals;

use Livewire\Component;

class Modal extends Component
{
    /**
     * По этому событию будет вызываться обработчик open
     * @var string
     */
    protected string $listenEvent = '';

    protected string $view = '';
    public string $titleKey = '';
    public string $messageKey = '';
    public string $okButtonKey = '';
    public string $cancelButtonKey = '';

    public string $message = '';
    public bool $show = false;
    public int $confirmedId = 0;
    public string $doneEvent = '';

    public function show()
    {
        $this->show = true;
    }

    public function close()
    {
        $this->show = false;
    }

    public function render()
    {
        return view($this->view);
    }

    public function open($id = 0)
    {
        $this->prepareMessage($id);

        $this->confirmedId = $id;
        $this->show();
    }

    public function confirm()
    {
        $this->submitDoneEvent();
        $this->close();
    }

    /**
     * Возвращает разрешение сохранять.
     * По умолчанию сохранять можно всегда.
     * @return bool
     */
    public function getCanBeSavedProperty(): bool
    {
        return true;
    }

    protected function prepareMessage($id)
    {
        // здесь можно добавить кастомизацию сообщения, например:
        // $this->message = trans($this->messageKey, ['book' => Book::findOrFail($id)->title]);
    }

    protected function submitDoneEvent(array $parameters = []): void
    {
        if (count($parameters) > 0) {
            $this->emit($this->doneEvent, ...$parameters);

            return;
        }

        $this->emit($this->doneEvent, $this->confirmedId);
    }

    protected function getListeners(): array
    {
        if ($this->listenEvent) {
            return [$this->listenEvent => 'open'];
        }

        return $this->listeners;
    }

}
