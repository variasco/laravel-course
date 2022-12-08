<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminCategoryTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreatingCategorySuccess()
    {
        $this->browse(function (Browser $browser)
        {
            $browser->visit('/admin/category/create')
                ->type("name", "test")
                ->press("Добавить")
                ->assertSee('Категория успешно добавлена');
            $browser->screenshot("categoryCreated");
        });
    }

    public function testCreatingCategoryValidation()
    {
        $this->browse(function (Browser $browser)
        {
            $browser->visit('/admin/category/create')
                ->type("name", "test")
                ->press("Добавить")
                ->assertSee('уже существует');
            $browser->screenshot("categoryUniqueFiledError");

            $browser->visit('/admin/category/create')
                ->press("Добавить")
                ->assertSee('обязательно для заполнения');
            $browser->screenshot("categoryEmptyFieldError");

            $browser->visit('/admin/category/create')
                ->type("name", "12")
                ->press("Добавить")
                ->assertSee('должно быть не меньше 3');
            $browser->screenshot("categoryShortFieldError");
        });
    }

    public function testUpdatingCategory()
    {
        $this->browse(function (Browser $browser)
        {
            $browser->visit("admin/category/1/edit")
                ->type("name", "test category")
                ->press("Изменить")
                ->assertSee("Категория успешно изменена");
            $browser->screenshot("categoryUpdated");
        });
    }
}
