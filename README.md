# Abominarium

## What is this project ?

The Abominarium is the final Symfony project for [Decima](https://github.com/decima)'s Symfony course.
The group members are [Joyce](https://github.com/jo15122002), [Arthur](https://github.com/Arthur-MONNET) and [Max](https://github.com/MaxLepan).

It is inspired by the Pokédex. 
It is a web application that allows you to discover the Abomistars, monsters with different types and abilities, and to create your own Abomistars.
You can see the list of all the Abomistars, their types, their abilities, and other information about them.

It *should* soon be available online. We'll update this README when it is.

## How to start the project

### Clone the project

```bash
git clone https://github.com/jo15122002/Abominarium.git
cd Abominarium
```

### Install dependencies

```bash
composer install --no-dev
```

Or, if you want to install the dev dependencies:

```bash
composer install
```

### Create the tables

```bash
php bin/console doctrine:schema:update --force
```

### Load the fixtures

```bash
php bin/console doctrine:fixtures:load
```

### Start the server

```bash
symfony serve
```

The project should be available at http://localhost:8000

---

## How to contribute

### Fork the project

1. Go to the [project page on GitHub](https://github.com/jo15122002/Abominarium)
2. Click on the "Fork" button in the top right corner
3. After a few seconds, you should be redirected to your fork at `https://github.com/YOUR_USERNAME/Abominarium`

### Clone your fork

```bash
git clone https://github.com/YOUR_USERNAME/Abominarium.git
cd Abominarium
```

### Set up syncing with the original repository

1. Add the original repository as a remote:
```bash
git remote add upstream https://github.com/jo15122002/Abominarium.git
```

2. Ensure the configuration is correct:
```bash
git remote -v
```

The output should look like this:
```console
origin    https://github.com/YOUR_USERNAME/Abominarium.git (fetch)
origin    https://github.com/YOUR_USERNAME/Abominarium.git (push)
upstream    https://github.com/jo15122002/Abominarium.git (fetch)
upstream    https://github.com/jo15122002/Abominarium.git (push)
```

Now you can install the dependencies and start the server as described above.

### Make your changes

1. Create a new branch

```bash
git checkout -b my-new-feature
```

2. Make your changes, commit and push them in your branch

### Create a pull request

1. Go to your fork on GitHub, you should see a button to create a new pull request, "Compare & pull request"
2. By default, the base fork should be `jo15122002/Abominarium` and the base should be `main`. If not, change it.
3. Click on "Create pull request"
4. Add a title and a description for your pull request and click on "Create pull request"

---

## Story

Welcome to the Abominarium, the Abomistar encyclopedia.

A long time ago, in a world filled with strange and terrifying monsters, people lived in constant fear of the creatures that surrounded them. Legends said that some of these beasts were portals to even darker worlds, where unspeakable horrors awaited the imprudent who dared to explore them.

That's when a young inventor named Hector had a revolutionary idea. He created a machine capable of analyzing and cataloging all the monstrous creatures he encountered. He named this machine "the Abominarium", in honor of the abominable creatures it was designed to catalog.

Soon, Hector became famous all over the world for his incredible discoveries on Abomistars, the monstrous creatures that populated the world. He used the Abominarium to catalog hundreds of creatures, sorting them by type and danger level.

Over time, the Abominarium became an indispensable reference for all adventurers who sought to explore the dangerous lands of the monster world. Inventors began working on smaller and more portable versions of the machine, so that travelers could take the Abominarium with them on their adventures.

Today, the Abominarium is an advanced digital encyclopedia containing detailed information on thousands of monstrous creatures of all types and sizes. Whether you are a treasure hunter, a brave adventurer or just a curious person, the Abominarium is the perfect tool to help you discover the strange and wonderful world of Abomistars.

## French version

Bienvenue dans l'Abominarium, l'encyclopédie des Abomistars.

Il y a longtemps, dans un monde rempli de monstres étranges et terrifiants, les gens vivaient dans la peur constante des créatures qui les entouraient. Les légendes disaient que certaines de ces bêtes étaient des portails vers des mondes encore plus sombres, où des horreurs indicibles attendaient les imprudents qui oseraient les explorer.

C'est alors qu'un jeune inventeur nommé Hector a eu une idée révolutionnaire. Il a créé une machine capable d'analyser et de répertorier toutes les créatures monstrueuses qu'il rencontrait. Il a nommé cette machine "l'Abominarium", en l'honneur des créatures abominables qu'elle était destinée à répertorier.

Bientôt, Hector est devenu célèbre dans le monde entier pour ses découvertes incroyables sur les Abomistars, les créatures monstrueuses qui peuplaient le monde. Il a utilisé l'Abominarium pour répertorier des centaines de créatures, les classant par type et par dangerosité.

Au fil du temps, l'Abominarium est devenu une référence incontournable pour tous les aventuriers qui cherchaient à explorer les terres dangereuses du monde des monstres. Les inventeurs ont commencé à travailler sur des versions plus petites et plus portables de la machine, afin que les voyageurs puissent emporter l'Abominarium avec eux dans leurs aventures.

Aujourd'hui, l'Abominarium est une encyclopédie numérique très avancée, contenant des informations détaillées sur des milliers de créatures monstrueuses de tous types et de toutes tailles. Que vous soyez un chercheur de trésors, un aventurier courageux ou simplement un curieux, l'Abominarium est l'outil parfait pour vous aider à découvrir le monde étrange et merveilleux des Abomistars.
