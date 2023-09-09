# Quest
`Implement a library providing SortedLinkedList
(linked list that keeps values sorted). It should be
able to hold string or int values, but not both. Try to
think about what you'd expect from such library as a
user in terms of usability and best practices, and
apply those.`

# Solution
SortedLinkedList

# Development
## Installation
`docker compose run composer install`

## Tests
`docker compose run composer phpunit`

## Usage
```php 
// Creating a sorted linked list for strings in ascending order
$sortedLinkedList = SortedLinkedListFactory::createStringList(OrderType::ASC);

// Inserting values
$sortedLinkedList->insertValue('Mike');
$sortedLinkedList->insertValue('Anna');
$sortedLinkedList->insertValue('Zoe');
$sortedLinkedList->insertValue('Bob');

// Getting number of elements
echo count($sortedLinkedList); // Outputs: 4

// Iterating over the list
foreach ($sortedLinkedList as $node) {
    echo '//' . $node . PHP_EOL;
}

// Outputs:
// Anna
// Bob
// Mike
// Zoe
```
