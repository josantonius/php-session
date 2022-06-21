# Contributing

We would love for you to contribute to this project and help make it even better!
As a contributor, here are the guidelines we would like you to follow:

---

- [Code of Conduct](#code-of-conduct)
- [Got a Question, Problem or Idea?](#got-a-question-problem-or-idea)
- [Add or Improve a Feature?](#add-or-improve-a-feature)
- [Found a Bug?](#found-a-bug)
- [Submitting an Issue](#submitting-an-issue)
- [Submitting a Pull Request](#submitting-a-pull-request)
  - [After Your Pull Request is Merged](#after-your-pull-request-is-merged)
- [Coding Rules](#coding-rules)
- [Commit Message Conventions](#commit-message-conventions)
  - [Commit Message Header](#commit-message-header)
    - [Type](#type)
    - [Scope](#scope)
    - [Summary](#summary)
  - [Commit Message Body](#commit-message-body)
  - [Commit Message Footer](#commit-message-footer)

---

## Code of Conduct

Help us keep this project open and inclusive.
Please read and follow our [Code of Conduct](CODE_OF_CONDUCT.md).

## Got a Question, Problem or Idea?

Start a [new discussion](https://github.com/josantonius/php-session/discussions/new) and select the
appropriate category for it:

- `General`: Anything that is relevant to the project.
- `Ideas`: Ideas to change/improve the project or propose new features.
- `Polls`: Polls with multi options for the community to vote for and discuss.
- `Q&A`: Questions for the community to answer, in a question/answer format.
- `Show and tell`: Creations, experiments, or tests relevant to the project.

## Add or Improve a Feature?

- For a **Major Feature**,
first [open a new discussion](https://github.com/josantonius/php-session/discussions/new) in the
`Ideas` category and outline your proposal so that it can be discussed. This will also allow us to
better coordinate our efforts, prevent duplication of work, and help you to craft the change so that
it is successfully accepted into the project.

- **Small Features** can be crafted and directly
[submitted as a Pull Request](#submitting-a-pull-request).

## Found a Bug?

If you find a bug in the source code, you can help us by
[submitting an issue](#submitting-an-issue) to our
[repository](https://github.com/josantonius/php-session). Even better, you can
[submit a Pull Request](#submitting-a-pull-request) with a fix.

## Submitting an Issue

Issues are very valuable for any project.

Great bug reports tend to have:

- A quick summary and/or background.
- Steps to reproduce.
- Be specific.
- Give sample code if you can.
- What you expected would happen.
- What actually happens.
- Notes; why you think this might be happening, tests that didn't work...

You can file new issues by filling out our
[new issue form](https://github.com/josantonius/php-session/issues/new).

## Submitting a Pull Request

Pull requests are a great way to put your ideas into this project or simply fix something.

Before you submit your Pull Request (PR) consider the following guidelines:

1. Search [GitHub](https://github.com/josantonius/php-session/pulls) for an open or closed PR that
relates to your submission. You don't want to duplicate effort.

1. [Fork](https://github.com/josantonius/php-session/fork) the repository to your own GitHub account.

1. Clone the repository to your machine.

1. Go to the cloned repository.

     ```shell
     cd php-session
     ```

1. Create a branch from the `main branch` with a succinct but descriptive name.

     ```shell
     git checkout -b descriptive-name main
     ```

1. Make your changes in the new git branch, including appropriate test cases.

1. Follow our [Coding Rules](#coding-rules).

1. Run the full repository test suite.

     ```shell
     composer tests
     ```

1. Commit your changes using a descriptive commit message that follows our
  [commit message conventions](#commit-message-conventions).

     ```shell
     git commit -a
     ```

    **The optional commit `-a` command line option will automatically "add" and "rm" edited files.**

1. Push your branch to GitHub:

    ```shell
    git push origin descriptive-name
    ```

1. In GitHub, send a [pull request](https://github.com/josantonius/php-session/compare/main..)
to `php-session:main`.

- If we suggest changes then:
  - Make the required updates.
  - Re-run the test suites to ensure tests are still passing.
  - Rebase your branch and force push to your GitHub repository (this will update your Pull Request):

    ```shell
    git rebase main -i
    git push -f
    ```

That's it! Thank you for your contribution!

### After Your Pull Request is Merged

After your pull request is merged, you can safely delete your branch and pull the changes from the
`main` (upstream) repository:

- Delete the remote branch on GitHub either through the GitHub web UI or your local shell as follows:

    ```shell
    git push origin --delete descriptive-name
    ```

- Check out the `main` branch:

    ```shell
    git checkout main -f
    ```

- Delete the local branch:

    ```shell
    git branch -D descriptive-name
    ```

- Update your ´main´ branch with the latest upstream version:

    ```shell
    git pull --ff upstream main
    ```

## Coding Rules

To ensure consistency throughout the source code, keep these rules in mind as you are working:

- All features or bug fixes **must be tested** by one or more specs (unit-tests).

  You can use the following command to check the tests:

    ```shell
    composer phpunit
    ```

- All new feature **must be documented** in the `README.md` file.

- We use `PHP CodeSniffer` and `PHP Mess Detector` to define our code standards.

  You can use the following commands to check the status of your code:

    ```shell
    composer phpcs
    ```

    ```shell
    composer phpmd
    ```

  You can use the following command to automatically format errors found with `PHP CodeSniffer`:

    ```shell
    composer fix
    ```

## Commit Message Conventions

We have very precise rules over how our Git commit messages must be formatted.
This format leads to **easier to read commit history**.

Each commit message consists of a **header**, a **body**, and a **footer**.

```none
<header>
<BLANK_LINE>
<body>
<BLANK_LINE>
<footer>
```

The `header` is mandatory and must conform to the
[Commit Message Header](#commit-message-header) format.

The `body` is optional. When the body is present it must be at least 20 characters long and must
conform to the [Commit Message Body](#commit-message-body) format.

The `footer` is optional. The [Commit Message Footer](#commit-message-footer) format describes what
the footer is used for and the structure it must have.

### Commit Message Header

```none
<type>(<scope>): <short summary>
  │          │          │
  │          │          └─> # Summary in present tense. Not capitalized. No period at the end.
  │          │
  │          └─> # Relevant short word. Not capitalized.
  │
  └─> # Commit Type: build|ci|docs|feat|fix|perf|refactor|test.
```

The `<type>` and `<summary>` fields are mandatory, the `(<scope>)` field is optional.

#### Type

Must be one of the following:

- `build`: Changes that affect the build system or external dependencies.
- `ci`: Changes to our CI configuration files and scripts.
- `docs`: Documentation only changes.
- `feat`: A new feature.
- `fix`: A bug fix.
- `perf`: A code change that improves performance.
- `refactor`: A code change that neither fixes a bug nor adds a feature.
- `test`: Adding missing tests or correcting existing tests.

#### Scope

A scope may be provided to a commit’s type, to provide additional contextual information and is
contained within parenthesis. For example:

```none
feat(parser): add ability to parse arrays
```

#### Summary

Use the summary field to provide a succinct description of the change:

- Use the imperative, present tense: "change" not "changed" nor "changes".
- Don't capitalize the first letter.
- No dot (.) at the end.

### Commit Message Body

Just as in the summary, use the imperative, present tense: "fix" not "fixed" nor "fixes".

Explain the motivation for the change in the commit message body. This commit message should explain
*why* you are making the change. You can include a comparison of the previous behavior with the new
behavior in order to illustrate the impact of the change.

### Commit Message Footer

The footer can contain information about breaking changes and deprecations and is also the place to
reference GitHub issues, Jira tickets, and other PRs that this commit closes or is related to.
For example:

```none
BREAKING CHANGE: <breaking change summary>
<BLANK LINE>
<breaking change description + migration instructions>
<BLANK LINE>
<BLANK LINE>
Fixes #<issue number>
```

or

```none
DEPRECATED: <what is deprecated>
<BLANK LINE>
<deprecation description + recommended update path>
<BLANK LINE>
<BLANK LINE>
Closes #<pr number>
```

Breaking Change section should start with the phrase "BREAKING CHANGE:" followed by a summary of the
breaking change, a blank line, and a detailed description of the breaking change that also includes
migration instructions.

Similarly, a Deprecation section should start with "DEPRECATED:" followed by a short description of
what is deprecated, a blank line, and a detailed description of the deprecation that also mentions
the recommended update path.

> This contribution guide is inspired from the
[Angular Contribution Guide](https://github.com/angular/angular/blob/main/CONTRIBUTING.md).
