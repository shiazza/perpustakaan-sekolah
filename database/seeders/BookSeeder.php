<?php

namespace Database\Seeders;

use App\Models\BookParent;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Look how many books we want to create
        $bookData = [
            [
                'title'    => 'The Lord of the Rings',
                'writers'  => 'J.R.R. Tolkien',
                'sinopsis' => 'A young hobbit, Frodo Baggins, inherits a ring of immense power and must travel across Middle-earth to destroy it.',
                'category_id' => 8, // Fantasy
                'publisher' => 'George Allen & Unwin',
            ],
            [
                'title'    => 'Pride and Prejudice',
                'writers'  => 'Jane Austen',
                'sinopsis' => 'The story of Elizabeth Bennet and her four sisters as they navigate issues of marriage, morality, and misconceptions in 19th-century England.',
                'category_id' => 7, // Romance
                'publisher' => 'T. Egerton',
            ],
            [
                'title'    => '1984',
                'writers'  => 'George Orwell',
                'sinopsis' => 'A dystopian social science fiction novel and cautionary tale about the dangers of totalitarianism and mass surveillance.',
                'category_id' => 1, // Fiction
                'publisher' => 'Secker & Warburg',
            ],
            [
                'title'    => 'To Kill a Mockingbird',
                'writers'  => 'Harper Lee',
                'sinopsis' => 'A novel about a young girl, Scout Finch, witnessing the trial of a black man accused of a crime in the Depression-era South.',
                'category_id' => 1, // Fiction
                'publisher' => 'J. B. Lippincott & Co.',
            ],
            [
                'title'    => 'Dune',
                'writers'  => 'Frank Herbert',
                'sinopsis' => 'Set on the desert planet Arrakis, a young man named Paul Atreides must lead his people to victory against his family’s enemies.',
                'category_id' => 3, // Science
                'publisher' => 'Chilton Books',
            ],
            [
                'title'    => 'The Great Gatsby',
                'writers'  => 'F. Scott Fitzgerald',
                'sinopsis' => 'A story of the wealthy Jay Gatsby and his unrequited love for Daisy Buchanan in the Roaring Twenties.',
                'category_id' => 1, // Fiction
                'publisher' => 'Charles Scribner\'s Sons',
            ],
            [
                'title'    => 'Harry Potter and the Sorcerer\'s Stone',
                'writers'  => 'J.K. Rowling',
                'sinopsis' => 'A young boy discovers on his eleventh birthday that he is a wizard and attends a magical school called Hogwarts.',
                'category_id' => 8, // Fantasy
                'publisher' => 'Bloomsbury',
            ],
            [
                'title'    => 'The Hobbit',
                'writers'  => 'J.R.R. Tolkien',
                'sinopsis' => 'The adventure of Bilbo Baggins as he is recruited by the wizard Gandalf to help a company of dwarves reclaim their mountain.',
                'category_id' => 8, // Fantasy
                'publisher' => 'George Allen & Unwin',
            ],
            [
                'title'    => 'Murder on the Orient Express',
                'writers'  => 'Agatha Christie',
                'sinopsis' => 'A famous detective, Hercule Poirot, must solve a murder on a luxurious train stranded in the snow.',
                'category_id' => 6, // Mystery
                'publisher' => 'Collins Crime Club',
            ],
            [
                'title'    => 'The Da Vinci Code',
                'writers'  => 'Dan Brown',
                'sinopsis' => 'A symbologist, Robert Langdon, uncovers a conspiracy that could shake the foundations of Christianity.',
                'category_id' => 1, // Fiction
                'publisher' => 'Doubleday',
            ],
            [
                'title'    => 'The Catcher in the Rye',
                'writers'  => 'J.D. Salinger',
                'sinopsis' => 'The story of Holden Caulfield and his experiences in New York City after being expelled from his prep school.',
                'category_id' => 1, // Fiction
                'publisher' => 'Little, Brown and Company',
            ],
            [
                'title'    => 'Frankenstein',
                'writers'  => 'Mary Shelley',
                'sinopsis' => 'A scientist, Victor Frankenstein, creates a sapient creature in an unorthodox scientific experiment.',
                'category_id' => 1, // Fiction
                'publisher' => 'Lackington, Hughes, Harding, Mavor & Jones',
            ],
            [
                'title'    => 'Moby Dick',
                'writers'  => 'Herman Melville',
                'sinopsis' => 'The quest of Captain Ahab, a tyrannical sea captain, to seek revenge on a giant white sperm whale.',
                'category_id' => 1, // Fiction
                'publisher' => 'Harper & Brothers',
            ],
            [
                'title'    => 'The Hunger Games',
                'writers'  => 'Suzanne Collins',
                'sinopsis' => 'In a post-apocalyptic future, a young woman volunteers to take her sister\'s place in a televised death match.',
                'category_id' => 1, // Fiction
                'publisher' => 'Scholastic Press',
            ],
            [
                'title'    => 'The Alchemist',
                'writers'  => 'Paulo Coelho',
                'sinopsis' => 'A young Andalusian shepherd named Santiago journeys to the Egyptian pyramids after having a recurring dream about a treasure.',
                'category_id' => 1, // Fiction
                'publisher' => 'HarperOne',
            ],
            [
                'title'    => 'The Martian',
                'writers'  => 'Andy Weir',
                'sinopsis' => 'An astronaut is left behind on Mars and must find a way to survive until a rescue mission can be sent.',
                'category_id' => 3, // Science
                'publisher' => 'Crown Publishing Group',
            ],
            [
                'title'    => 'The Road',
                'writers'  => 'Cormac McCarthy',
                'sinopsis' => 'A father and his young son journey across a post-apocalyptic landscape in a desperate attempt to survive.',
                'category_id' => 1, // Fiction
                'publisher' => 'Alfred A. Knopf',
            ],
            [
                'title'    => 'Gone Girl',
                'writers'  => 'Gillian Flynn',
                'sinopsis' => 'On the day of his fifth wedding anniversary, Nick Dunne’s wife, Amy, disappears, and he becomes the prime suspect.',
                'category_id' => 6, // Mystery
                'publisher' => 'Crown Publishing Group',
            ],
            [
                'title'    => 'Sapiens: A Brief History of Humankind',
                'writers'  => 'Yuval Noah Harari',
                'sinopsis' => 'A book that surveys the entire history of the human race, from the evolution of archaic human species to the twenty-first century.',
                'category_id' => 2, // Non-Fiction
                'publisher' => 'Harper',
            ],
            [
                'title'    => 'Educated',
                'writers'  => 'Tara Westover',
                'sinopsis' => 'A memoir about a young girl who, kept out of school by her survivalist parents, overcomes all odds to earn a PhD from Cambridge University.',
                'category_id' => 5, // Biography
                'publisher' => 'Random House',
            ]
        ];

        // Loop through each book to create BookParent records
        foreach ($bookData as $data) {
            $categories = [];
            if (isset($data['category'])) {
                // Find category by name
                $category = Category::where('name', $data['category'])->first();
                if ($category) {
                    $data['category_id'] = $category->id_cate;
                    $categories[] = $category;
                } else {
                    // Create new category if doesn't exist
                    $newCategory = Category::create(['name' => $data['category']]);
                    $data['category_id'] = $newCategory->id_cate;
                    $categories[] = $newCategory;
                }
                unset($data['category']); // Remove category name from array
            }

            $bookParent = BookParent::create($data);

            // Attach categories to the book parent
            if (!empty($categories)) {
                $bookParent->categories()->attach($categories);
            }
        }
    }
}