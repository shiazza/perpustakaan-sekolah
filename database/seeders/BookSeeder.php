<?php

namespace Database\Seeders;

use App\Models\BookChild;
use App\Models\BookParent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
                'category' => 'Fantasy',
            ],
            [
                'title'    => 'Pride and Prejudice',
                'writers'  => 'Jane Austen',
                'sinopsis' => 'The story of Elizabeth Bennet and her four sisters as they navigate issues of marriage, morality, and misconceptions in 19th-century England.',
                'category' => 'Romance',
            ],
            [
                'title'    => '1984',
                'writers'  => 'George Orwell',
                'sinopsis' => 'A dystopian social science fiction novel and cautionary tale about the dangers of totalitarianism and mass surveillance.',
                'category' => 'Science Fiction',
            ],
            [
                'title'    => 'To Kill a Mockingbird',
                'writers'  => 'Harper Lee',
                'sinopsis' => 'A novel about a young girl, Scout Finch, witnessing the trial of a black man accused of a crime in the Depression-era South.',
                'category' => 'Classic',
            ],
            [
                'title'    => 'Dune',
                'writers'  => 'Frank Herbert',
                'sinopsis' => 'Set on the desert planet Arrakis, a young man named Paul Atreides must lead his people to victory against his family’s enemies.',
                'category' => 'Science Fiction',
            ],
            [
                'title'    => 'The Great Gatsby',
                'writers'  => 'F. Scott Fitzgerald',
                'sinopsis' => 'A story of the wealthy Jay Gatsby and his unrequited love for Daisy Buchanan in the Roaring Twenties.',
                'category' => 'Classic',
            ],
            [
                'title'    => 'Harry Potter and the Sorcerer\'s Stone',
                'writers'  => 'J.K. Rowling',
                'sinopsis' => 'A young boy discovers on his eleventh birthday that he is a wizard and attends a magical school called Hogwarts.',
                'category' => 'Fantasy',
            ],
            [
                'title'    => 'The Hobbit',
                'writers'  => 'J.R.R. Tolkien',
                'sinopsis' => 'The adventure of Bilbo Baggins as he is recruited by the wizard Gandalf to help a company of dwarves reclaim their mountain.',
                'category' => 'Fantasy',
            ],
            [
                'title'    => 'Murder on the Orient Express',
                'writers'  => 'Agatha Christie',
                'sinopsis' => 'A famous detective, Hercule Poirot, must solve a murder on a luxurious train stranded in the snow.',
                'category' => 'Mystery',
            ],
            [
                'title'    => 'The Da Vinci Code',
                'writers'  => 'Dan Brown',
                'sinopsis' => 'A symbologist, Robert Langdon, uncovers a conspiracy that could shake the foundations of Christianity.',
                'category' => 'Thriller',
            ],
            [
                'title'    => 'The Catcher in the Rye',
                'writers'  => 'J.D. Salinger',
                'sinopsis' => 'The story of Holden Caulfield and his experiences in New York City after being expelled from his prep school.',
                'category' => 'Classic',
            ],
            [
                'title'    => 'Frankenstein',
                'writers'  => 'Mary Shelley',
                'sinopsis' => 'A scientist, Victor Frankenstein, creates a sapient creature in an unorthodox scientific experiment.',
                'category' => 'Horror',
            ],
            [
                'title'    => 'Moby Dick',
                'writers'  => 'Herman Melville',
                'sinopsis' => 'The quest of Captain Ahab, a tyrannical sea captain, to seek revenge on a giant white sperm whale.',
                'category' => 'Adventure',
            ],
            [
                'title'    => 'The Hunger Games',
                'writers'  => 'Suzanne Collins',
                'sinopsis' => 'In a post-apocalyptic future, a young woman volunteers to take her sister\'s place in a televised death match.',
                'category' => 'Young Adult',
            ],
            [
                'title'    => 'The Alchemist',
                'writers'  => 'Paulo Coelho',
                'sinopsis' => 'A young Andalusian shepherd named Santiago journeys to the Egyptian pyramids after having a recurring dream about a treasure.',
                'category' => 'Philosophy',
            ],
            [
                'title'    => 'The Martian',
                'writers'  => 'Andy Weir',
                'sinopsis' => 'An astronaut is left behind on Mars and must find a way to survive until a rescue mission can be sent.',
                'category' => 'Science Fiction',
            ],
            [
                'title'    => 'The Road',
                'writers'  => 'Cormac McCarthy',
                'sinopsis' => 'A father and his young son journey across a post-apocalyptic landscape in a desperate attempt to survive.',
                'category' => 'Post-Apocalyptic',
            ],
            [
                'title'    => 'Gone Girl',
                'writers'  => 'Gillian Flynn',
                'sinopsis' => 'On the day of his fifth wedding anniversary, Nick Dunne’s wife, Amy, disappears, and he becomes the prime suspect.',
                'category' => 'Thriller',
            ],
            [
                'title'    => 'Sapiens: A Brief History of Humankind',
                'writers'  => 'Yuval Noah Harari',
                'sinopsis' => 'A book that surveys the entire history of the human race, from the evolution of archaic human species to the twenty-first century.',
                'category' => 'Non-fiction',
            ],
            [
                'title'    => 'Educated',
                'writers'  => 'Tara Westover',
                'sinopsis' => 'A memoir about a young girl who, kept out of school by her survivalist parents, overcomes all odds to earn a PhD from Cambridge University.',
                'category' => 'Non-fiction',
            ]
        ];

        // Loop through each book to create BookParent and BookChild records
        foreach ($bookData as $data) {
            $bookParent = BookParent::create([
                'title'    => $data['title'],
                'writers'  => $data['writers'],
                'sinopsis' => $data['sinopsis'],
                'category' => $data['category'],
                'image'    => 'https://example.com/images/' . Str::slug($data['title']) . '.jpg', // Dummy image URL
            ]);

            // Create 3 physical copies for each parent book
            for ($i = 0; $i < 3; $i++) {
                BookChild::create([
                    'bp_id'     => $bookParent->id_bp,
                    'ISBN'      => '978-0-307-' . str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT), // Generate a random ISBN
                    'condition' => ['Good', 'Fair', 'Poor'][array_rand(['Good', 'Fair', 'Poor'])], // Random condition
                ]);
            }
        }
    }
}