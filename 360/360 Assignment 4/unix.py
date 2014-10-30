__author__ = 'Jake Hayhurst'

def ls(filenames):
    result = []
    result.append('------------------------------------------------------------')
    filenames.sort()
    size = 0
    for i in filenames:
        if size < len(i):
            size = len(i)
    temp= addSpacesAfter(filenames, size)
    return findRows(temp)

def addSpacesAfter(files, longestWord):
    newList = []
    for i in files:
        size = longestWord - len(i)
        item = i
        for j in range(size):
            item += ' '
        item += '  '
        newList.append(item)
    return newList

def findRows(files):
    max = 60
    rows = 1
    for i in files:
        if max < len(i) - 2:
            rows += 1
            max = 60 - len(i)
        else:
            max -= len(i)
    return rows
