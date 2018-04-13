import requests


def req(route, data=None, cookies=None):
    if cookies:
        return requests.post('http://127.0.0.1:8000/' + route, data=data, cookies=cookies)
    else:
        return requests.post('http://127.0.0.1:8000/' + route, data=data)


def register(name, email, password):
    response = req('register', {
        'name': name,
        'password': password,
        'email': email,
    })
    return response.json(), response.cookies


def login(name, password):
    response = req('sign-in', {
        'name': name,
        'password': password,
    })
    return response.json(), response.cookies


def show_balance(number, password, ccv2, cookie):
    response = req('account/show_balance', {
        'number': number,
        'password': password,
        'ccv2': ccv2,
    }, cookie)
    return response.json()


def send_credit(from_account, to_account, password, ccv2, amount, cookie):
    response = req('transaction/send_credit', {
        'from': from_account,
        'to': to_account,
        'password': password,
        'ccv2': ccv2,
        'amount': amount,
    }, cookie)
    return response.json()


def get_credit(number, password, ccv2, amount, cookie):
    response = req('transaction/get_credit', {
        'from': number,
        'password': password,
        'ccv2': ccv2,
        'amount': amount,
    }, cookie)
    return response.json()


def create_account(cookie):
    response = req('account/create_account', cookies=cookie)
    return response.json()


print('Hello!!')

while True:
    entry = int(input('Enter 1 to register or 2 to log in\n'))

    if entry == 1:
        res = register(
            input('Enter your name: '),
            input('Enter your email address: '),
            input('Enter your password: ')
        )
        if res[0]['status'] == 'OK':
            print('Your account has been made with username: ' + res[0]['name'])
            break
    elif entry != 2:
        print('Wrong entry')
        continue
    break

while True:
    res = login(
        input('Enter your name: '),
        input('Enter your password: ')
    )
    if res[0]['status'] == 'OK':
        cookie = res[1]
        print('Welcome', res[0]['name'])
        break
    else:
        print(res[0]['message'])

while True:
    print('What Do you want to do?')
    print('1. Create Account')
    print('2. Show Balance')
    print('3. Get Credit')
    print('4. Send Credit')
    print('5. Exit')
    entry = int(input('Enter option: '))
    if entry == 1:
        res = create_account(cookie)
        if res['status'] == 'OK':
            print('Account number:', res['account']['number'])
            print('password:', res['account']['password'])
            print('ccv2:', res['account']['ccv2'])
            print('expiration:', res['account']['expiration'])
        else:
            print(res['message'])

    elif entry == 2:
        res = show_balance(
            input('Account number: '),
            input('password: '),
            input('ccv2: '),
            cookie
        )
        if res['status'] == 'OK':
            print('Your accounts (', res['account-number'], ') balance is', res['balance'])
        else:
            print(res['message'])

    elif entry == 3:
        res = get_credit(
            input('Account number: '),
            input('password: '),
            input('ccv2: '),
            input('Amount: '),
            cookie
        )
        if res['status'] == 'OK':
            print(res['process'])
        else:
            print(res['message'])

    elif entry == 4:
        res = send_credit(
            input('Original account number: '),
            input('Destination account number: '),
            input('password: '),
            input('ccv2: '),
            input('Amount: '),
            cookie
        )
        if res['status'] == 'OK':
            print(res['process'])
        else:
            print(res['message'])

    elif entry == 5:
        print('Goodbye!')
        break
    else:
        print('Wrong entry')
    print()
