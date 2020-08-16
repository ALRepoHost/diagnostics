from pathlib import Path

myfile = Path("../scripts/")


def intro(alpha, beta):

    return alpha + beta


print(intro.__doc__)
