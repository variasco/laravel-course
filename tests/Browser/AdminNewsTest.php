<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminNewsTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreatingNewsSuccess()
    {
        $this->browse(function (Browser $browser)
        {
            $browser->visit('/admin/news/create')
                ->type("title", "test title")
                ->type("short", "test short")
                ->type("description", "test description")
                ->press("Добавить")
                ->assertSee("Новость успешно добавлена");
            $browser->screenshot("newsCreated");
        });
    }

    public function testCreatingNewsValidation()
    {
        $this->browse(function (Browser $browser)
        {
            $browser->visit('/admin/news/create')
                ->press("Добавить")
                ->assertSee("обязательно для заполнения");
            $browser->screenshot("newsRequiredFields");

            $browser->visit('/admin/news/create')
                ->type("title", "12")
                ->press("Добавить")
                ->assertSee("Количество символов в поле Заголовок должно быть не меньше 3");
            $browser->screenshot("newsFieldIsTooShort");
        });
    }

    public function testUpdatingNews()
    {
        $this->browse(function (Browser $browser)
        {
            $browser->visit('/admin/news/1/edit')
                ->type("title", "test updated title")
                ->type("short", "test updated short")
                ->type("description", "test updated description")
                ->press("Изменить")
                ->assertSee("Новость успешно изменена");
            $browser->screenshot("newsUpdated");
        });
    }
}
