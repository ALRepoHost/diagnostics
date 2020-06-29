from pathlib import Path

myfile = Path("../scripts/")

def intro(alpha, beta):
    """
    This is sample comment
    """
    return alpha + beta
    
print(intro.__doc__)